<?php

namespace App\Services;

use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RoleUserRepository;
use App\Repositories\UserRepository;

class AdminService
{
    protected $orderDetailRepository;
    protected $orderItemRepository;
    protected $userRepository;
    protected $roleUserRepository;
    protected $productRepository;

    public function __construct(
        OrderDetailRepository $orderDetailRepository,
        OrderItemRepository $orderItemRepository,
        UserRepository $userRepository,
        RoleUserRepository $roleUserRepository,
        ProductRepository $productRepository,
    ) {
        $this->orderDetailRepository = $orderDetailRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->userRepository = $userRepository;
        $this->roleUserRepository = $roleUserRepository;
        $this->productRepository = $productRepository;
    }

    public function showOrderDetails() {
        return $this->orderDetailRepository->getOrderDetails();
    }

    public function showOrder($data){
        $orders = $this->orderItemRepository->getOrderItemsByOrderId($data['id']);
        $view = view('admin.pages.show-list-order')->with([
            'orders' => $orders
        ])->render();
        return $view;
    }

    public function updateStatus($data){
        $update = $this->orderDetailRepository->updateStatusByOrderId($data['id']);
        $success = false;
        if ($update) {
            $success = true;
        }
        return [
            $success
        ];
    }

    public function showUser() {
        return $this->userRepository->getUsers();
    }

    public function updateRoleUser($data) {
        $roleUser = $this->roleUserRepository->createRoleUser($data['user_id'],$data['role_id']);
        $success = false;
        if ($roleUser) {
            $success = true;
        }
        return $success;
    }

    public function removeRoleUser($data) {
        $roleUser = $this->roleUserRepository->removeRoleUser($data['user_id'],$data['role_id']);
        return isset($roleUser);
    }

    public function searchOrderDetails($data){
        $orderDetails = $this->orderDetailRepository->getOrderDetailByOrderId(strtoupper($data['search_order']));
        $view = view('admin.pages.list-order')->with([
            'orderDetails' => $orderDetails
        ])->render();
        return [
            $orderDetails->count() > 0,
            $view
        ];
    }

    public function searchUser($data){
        $listUsers = $this->userRepository->getUserByPhone($data['search_user']);
        $view = view('admin.pages.list-user')->with([
            'listUsers' => $listUsers
        ])->render();
        return [
            $listUsers->count() > 0,
            $view
        ];
    }

    public function setProduct($data) {
        $file = $data['product_image'];
        $file_name = $data['product_image']->getClientOriginalName();
        $fileName = randomTime().substr($file_name, strpos($file_name, '.'), strlen($file_name));
        if ($data['product_discount'] == 1) {
            $file->move('assets/user/img/product', $fileName);
        } else {
            $file->move('assets/user/img/product/discount', $fileName);
        }
        $arrayData = [
            'name' => $data['product_name'],
            'price' => $data['product_price'],
            'description' => $data['product_description'],
            'category_id' => $data['product_category'],
            'discount_id' => $data['product_discount'],
            'img' => '/'.$fileName,
        ];
        return $this->productRepository->setProduct($arrayData);
    }

    public function showProduct() {
        return $this->productRepository->getProduct();
    }

    public function deteleProduct($data) {
        return $this->productRepository->deleteProductById($data['id']);
    }
}
