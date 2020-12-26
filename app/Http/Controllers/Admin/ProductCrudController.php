<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        $product = Product::query()->findOrFail($id);
        if ($product->img != null){
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $product->img)){
                unlink($_SERVER['DOCUMENT_ROOT'] . $product->img);
            }
        }
        return $this->crud->delete($id);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addColumn([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Name',
        ]);

        $this->crud->addColumn([
            'name' => 'img',
            'type' => 'image',
            'label' => 'Image',
        ]);

        $this->crud->addColumn([
            'name' => 'excerpt',
            'type' => 'text',
            'label' => 'Excerpt',
        ]);

        $this->crud->addColumn([
            'name' => 'text',
            'type' => 'text',
            'label' => 'Text',
        ]);

        $this->crud->addColumn([
            'name' => 'price',
            'type' => 'number',
            'label' => 'Price',
            'decimals' => 2
        ]);

        $this->crud->addColumn([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Category',
            'entity' => 'category',
            'attribute' => 'title',
            'model' => Category::class,
        ]);

        $this->crud->addColumn([
            'name' => 'user_id',
            'type' => 'select',
            'label' => 'User',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => User::class,
        ]);

        $this->crud->addColumn([
            'name' => 'brand_id',
            'type' => 'select',
            'label' => 'Brand',
            'entity' => 'brand',
            'attribute' => 'title',
            'model' => Brand::class,
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => 'Created',
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'datetime',
            'label' => 'Updated',
        ]);

        $this->crud->addFilter([
            'name'  => 'category_id',
            'type'  => 'select2_multiple',
            'label' => 'Category'
        ], function() {
            $query = Category::all();
            $categories = [];
            $i = 1;
            foreach ($query as $category){
                $categories[$i++] = $category->title;
            }
            return $categories;
        }, function($values) {
            $this->crud->addClause('whereIn', 'category_id', json_decode($values));
        });

        $this->crud->addFilter([
            'name'       => 'price',
            'type'       => 'range',
            'label'      => 'Price',
            'label_from' => 'min value',
            'label_to'   => 'max value'
        ],
            false,
            function($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'price', '>=', (float) $range->from);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'price', '<=', (float) $range->to);
                }
            });

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

        CRUD::setValidation(ProductRequest::class);

        $this->crud->addField([
            'name' => 'user_id',
            'type' => 'hidden',
            'value' => backpack_user()->id,
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Category',
            'entity' => 'category',
            'attribute' => 'title',
            'model' => Category::class,
        ]);

        $this->crud->addField([
            'name' => 'brand_id',
            'type' => 'select',
            'label' => 'Brand',
            'entity' => 'brand',
            'attribute' => 'title',
            'model' => Brand::class,
        ]);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Name',
        ]);

        $this->crud->addField([
            'name' => 'excerpt',
            'type' => 'textarea',
            'label' => 'Excerpt',
        ]);

        $this->crud->addField([
            'name' => 'text',
            'type' => 'textarea',
            'label' => 'Text',
        ]);

        $this->crud->addField([
            'name' => 'price',
            'type' => 'number',
            'label' => 'Price',
        ]);

        $this->crud->addField([
            'name' => 'img',
            'type' => 'image',
            'label' => 'Image',
        ]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
