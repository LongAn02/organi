<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Discount;
use App\Repositories\DiscountRepository;
use App\Services\AdminService;
use App\Services\CategoryService;
use App\Services\LoginRegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    protected $loginRegisterService;
    protected $adminService;
    protected $categoryService;
    protected $discountRepository;

    public function __construct(
        LoginRegisterService $loginRegisterService,
        AdminService $adminService,
        CategoryService $categoryService,
        DiscountRepository $discountRepository,

    ) {
        $this->loginRegisterService = $loginRegisterService;
        $this->adminService = $adminService;
        $this->categoryService = $categoryService;
        $this->discountRepository = $discountRepository;
    }

    public function loginAdmin(
        LoginRequest $request
    ){
        return $this->loginRegisterService->getViewByRole($request->all());
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return view('admin.login-admin');
    }

    public function showOrderDetails() {
        $orderDetails = $this->adminService->showOrderDetails();
        return view('admin.pages.table-orders')->with([
            'orderDetails' => $orderDetails
        ]);
    }

    public function showOrder(Request $request){
        return $this->adminService->showOrder($request->all());
    }

    public function updateStatus(Request $request) {
        $success = $this->adminService->updateStatus($request->all());
        return response()->json([
            'success' => $success
        ]);
    }

    public function showUser(){
        $listUsers = $this->adminService->showUser();
        return view('admin.pages.table-users')->with([
            'listUsers' => $listUsers
        ]);
    }

    public function updateRole(Request $request) {
        $success = $this->adminService->updateRoleUser($request->all());
        return response()->json([
            'success' => $success,
        ]);
    }

    public function removeRole(Request $request) {
        $success = $this->adminService->removeRoleUser($request->all());
        return response()->json([
            'success' => $success,
        ]);
    }

    public function searchOrderDetail(Request $request) {
        [$success, $view] = $this->adminService->searchOrderDetails($request->all());

        return response()->json([
            'success' => $success,
            'view' => $view
        ]);
    }

    public function searchUser(Request $request) {
        [$success, $view] = $this->adminService->searchUser($request->all());
        return response()->json([
            'success' => $success,
            'view' => $view
        ]);
    }

    public function viewPoster() {
        if (Gate::allows('is-admin') || Gate::allows('is-poster')) {
            return view('admin.the-poster.view-poster');
        } else {
            dd('sai');
        }
    }

    public function viewAddProduct () {
        $categories = $this->categoryService->getCategories();
        $discounts = $this->discountRepository->getDiscount();
        return view('admin.the-poster.add-product')->with([
            'categories' => $categories,
            'discounts' => $discounts
        ]);
    }

    public function addProduct(AddProductRequest $request){
        if ($request->has('product_image')){
            $this->adminService->setProduct($request->all());
        }
        return redirect()->back()->with([
            'success' => 'The product has been added to the product list'
        ]);
    }

    public function showProduct() {
        $listProduct = $this->adminService->showProduct();
        return view('admin.the-poster.list-product')->with([
            'listProduct' => $listProduct
        ]);
    }

    public function deleteProductFromListProductAdmin(Request $request) {
        $success = $this->adminService->deteleProduct($request->all());
        return response()->json([
           'success' => $success
        ]);
    }
}
