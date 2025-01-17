<?php
namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        // Store the category ID to delete it later
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);

        if ($category) {
            // Path to the image file
            $path = 'uploads/category/'.$category->image;

            // Check if the file exists before attempting to delete it
            if (File::exists($path)) {
                File::delete($path);  // Delete the image file
            }

            // Delete the category from the database
            $category->delete();

            // Flash success message
            session()->flash('message', 'Category Deleted');

            // Close the modal by dispatching a browser event
            $this->dispatch('close-modal');
        }
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
