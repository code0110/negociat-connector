<?php

namespace Botble\NegociatConnector\Http\Controllers;

use Assets;
use Botble\ACL\Models\User;
use Botble\NegociatConnector\Models\NegociatProduct;
use Botble\NegociatConnector\Exports\ProductsExport;
use Botble\NegociatConnector\Imports\ImportNegociatProducts;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Throwable;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;

class NegociatConnectorController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Assets::addScriptsDirectly('vendor/core/plugins/negociat-connector/js/negociat-connector.js')
            ->addStylesDirectly('vendor/core/plugins/negociat-connector/css/negociat-connector.css');

        page_title()->setTitle(trans('plugins/negociat-connector::negociat-connector.name'));
        $products = NegociatProduct::get();

        return view('plugins/negociat-connector::index', compact('products'));
    }

    public function import_negociat() 
    {
        Excel::import(new ImportNegociatProducts, request()->file('file')->store('temp'));
               
        return back();
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.csv');
    }
}
