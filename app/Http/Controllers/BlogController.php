<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function getBlogsByPublished(Request $request): Factory|Application|View
    {
        $search = $request->input('search');

        if ($search) {
            $publishedBlogs = Blog::where('is_published', true)
                ->where(function ($query) use ($search) {
                    $query->where('blog_title', 'like', '%' . $search . '%')
                        ->orWhere('blog_category', 'like', '%' . $search . '%');
                })
                ->get();

        } else {
            $publishedBlogs = Blog::where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('user.blog.index', compact('publishedBlogs'));
    }
    public function getBlogsByOwner(): Factory|Application|View
    {

        $blogsOwner = Blog::where('created_by', auth()->id())->get();

        $publishedBlogsOwner = Blog::where('created_by', auth()->id())
            ->where('is_published', true)
            ->get();

        $unpublishedBlogsOwner = Blog::where('created_by', auth()->id())
            ->where('is_published', false)
            ->get();

        $blogCount = $publishedBlogsOwner->count() + $unpublishedBlogsOwner->count();
        $blogCountUnpublished = $unpublishedBlogsOwner->count();
        $blogCountPublished = $publishedBlogsOwner->count();

        $latestBlog = $this->getLatestBlogsByOwner();

        return view('user.profile.index', compact(
            'publishedBlogsOwner',
            'unpublishedBlogsOwner',
            'blogsOwner',
            'blogCount',
            'blogCountUnpublished',
            'blogCountPublished',
            'latestBlog',
        ));
    }
    public function getLatestBlogsByOwner()
    {
        return Blog::where('created_by', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first();
    }
    public function getNumberBlogsAndUsers(): Factory|Application|View{

        $publishedBlogs = Blog::where('is_published', true)->get();

        $blogCount = $publishedBlogs->count();
        $userCount = User::all()->count();

        return view('index', compact('blogCount', 'userCount'));
    }
    public function getBlogDetail(Blog $blog): Factory|Application|View
    {
        $blog->load('author');
        return view('user.blog-detail.index', compact('blog'));
    }
    public function getBlogEdit(Blog $blog): Factory|Application|View
    {
        $blog->load('author');
        return view('user.blog-edit.index', compact('blog'));
    }
    public function createBlog(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:PROGRAMMING,AI',
            'privacy' => 'required|in:0,1',
            'caption' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Create a unique filename
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Move file to public/images/blogs
            $filePath = $file->storeAs('public/blogs', $fileName);
        }

        // Store blog in the database
        Blog::create([
            'blog_title' => $request->title,
            'blog_caption' => $request->caption,
            'blog_thumbnail' => $filePath ? Storage::url($filePath) : null,
            'blog_category' => $request->category,
            'created_by' => $request->user()->id,
            'is_published' => $request->privacy,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'New blog created successfully!');
    }
    public function deleteBlog($id): RedirectResponse{

        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    public function editBlog(Request $request, $id): RedirectResponse{

        $blog = Blog::findOrFail($id);

        if ($blog->created_by !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:PROGRAMMING,AI', // Add more categories as needed
            'privacy' => 'required|in:0,1',
            'caption' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
            'created_by' => 'required|exists:users,id', // Ensure created_by is valid
        ]);

        $filePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($blog->blog_thumbnail) {
                Storage::disk('public')->delete($blog->blog_thumbnail);
            }

            // Create a unique filename
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Move file to public/images/blogs
            $filePath = $file->storeAs('public/blogs', $fileName);
        }

        $blog->update([
            'blog_title' => $validated['title'],
            'blog_category' => $validated['category'],
            'is_published' => $validated['privacy'],
            'blog_caption' => $validated['caption'],
            'blog_thumbnail' => $filePath ? Storage::url($filePath) : $blog->blog_thumbnail,
            'created_by' => $validated['created_by'],
        ]);

        return redirect('/profile')->with('success', 'Blog updated successfully!');
    }
}
