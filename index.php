<?php

require_once('model/user_db.php');
require_once('model/user.php');
require_once('model/thread_db.php');
require_once('model/post_db.php');
require_once('model/product_db.php');
require_once('model/role_db.php');
require_once('model/contact_db.php');
require_once('model/order_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'home';
    }
}

switch ($action) {
    case 'home':
        include('home.php');
        die();
        break;

    case 'contact':
        $success = "";
        $mClass = "";
        $mError = "form-group";
        $m_error = "";
        $message = "";
        $emailClass = "";
        $emailError = "form-group";
        $email_error = "";
        $email = "";
        include('view/contact.php');
        die();
        break;

    case 'aboutUs':
        include('view/aboutUs.php');
        die();
        break;

    case'register':

        $emailClass = "";
        $emailError = "form-group";
        $unClass = "";
        $unError = "form-group";
        $pwClass = "";
        $pwError = "form-group";
        $cpwClass = "";
        $cpwError = "form-group";
        $fnClass = "";
        $fnError = "form-group";
        $lnClass = "";
        $lnError = "form-group";

        $email_error = '';
        $un_error = '';
        $pw_error = '';
        $cpw_error = '';
        $fn_error = '';
        $ln_error = '';
        $email = '';
        $un = '';
        $pw = '';
        $cpw = '';
        $fn = '';
        $ln = '';
        include('view/register.php');
        die();
        break;

    case 'valRegister':
        include('model/valRegister.php');
        die();
        break;
    case 'login':
        $un = '';
        $pw = '';
        $un_error = '';
        $pw_error = '';
        $unClass = "";
        $unError = "form-group";
        $pwClass = "";
        $pwError = "form-group";
        include('view/login.php');
        die();
        break;
    case 'valLogin':
        include('model/valLogin.php');
        die();
        break;
    case 'logout':
        session_destroy();
        unset($_SESSION['username']);
        header("Location: home.php");

    case 'forum':

        $threads = thread_db::get_threads();
        include('view/forum.php');
        die();
        break;

    case 'viewAccount':
        $message = "";
        include('view/account.php');
        die();
        break;
    case 'accountInfo':
        $emailClass = "";
        $emailError = "form-group";
        $unClass = "";
        $unError = "form-group";

        $fnClass = "";
        $fnError = "form-group";
        $lnClass = "";
        $lnError = "form-group";

        $email_error = '';
        $un_error = '';

        $fn_error = '';
        $ln_error = '';
        $email = '';
        $un = '';
        $pw = '';
        $cpw = '';
        $fn = '';
        $ln = '';
        include('view/accountInfo.php');
        die();
        break;

    case 'resetPw':
        $pw = "";
        $p = "";
        $pwClass = "";
        $pwError = "form-group";
        $cpwClass = "";
        $cpwError = "form-group";
        $pw_error = '';
        $cpw_error = '';
        include('view/resetPw.php');
        die();
        break;

    case 'valResetPw':
        include('model/valResetPw.php');
        die();
        break;
    case 'valUpdateUser':
        include('model/valUpdateUser.php');
        die();
        break;

    case 'newThread':
        $body = "";
        $subject = "";
        $sClass = "";
        $sError = "form-group";
        $bError = "form-group";
        $s_error = "";
        $b_error = "";
        $bClass = "";
        include('view/createThread.php');
        die();
        break;

    case 'valNewThread':
        include('model/valNewThread.php');
        die();
        break;

    case 'viewThread':

        $postError = "Enter comment";
        $id = filter_input(INPUT_GET, 'id');
        $thread = thread_db::get_thread_byId($id);
        $posts = post_db::get_posts_by_threadId($id);
        include ('view/viewThread.php');
        die();
        break;

    case 'valPost':

        $body = filter_input(INPUT_POST, 'body');
        $threadId = filter_input(INPUT_POST, 'threadId');
        if ($body === "") {
            $postError = "Body Required";
            $thread = thread_db::get_thread_byId($threadId);
            $posts = post_db::get_posts_by_threadId($thread->getId());
            include ('view/viewThread.php');
        } else if ($body != "") {
            post_db::add_post('', $threadId, $_SESSION['user']->getUsername(), $body);
            $postCount = thread_db::getPostCount($threadId);
            $postError = "Enter comment";
            $thread = thread_db::get_thread_byId($threadId);
            $posts = post_db::get_posts_by_threadId($threadId);
            $lastPost = thread_db::getLastPost($threadId);
            thread_db::setLastPost($threadId, $lastPost);
            thread_db::setPostCount($threadId, $postCount);
            include ('view/viewThread.php');
        }

        die();
        break;

    case 'shop':
        $numOfCols = 4;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        $products = product_db::getAllProducts();
        include('view/shop.php');
        die();
        break;

    case 'addProduct':
        $q = "";
        $qClass = "";
        $qError = "form-group";
        $q_error = "";
        $nameClass = "";
        $nameError = "form-group";
        $name = "";
        $pdClass = "";
        $pdError = "form-group";
        $pd = "";
        $priceError = "form-group";
        $priceClass = "";
        $price = "";
        $name_error = "";
        $pd_error = "";
        $price_error = "";
        $image_error = "";
        include('view/addProduct.php');
        die();
        break;

    case 'valAddProduct':
        include('model/valAddProduct.php');
        die();
        break;

    case 'editProduct':

        $id = filter_input(INPUT_POST, 'id');
        $product = product_db::getProduct_byId($id);
        $nameError = "form-group";
        $nameClass = "";
        $name = "";
        $pdClass = "";
        $pdError = "form-group";
        $pd = "";
        $priceError = "form-group";
        $priceClass = "";
        $price = "";
        $name_error = "";
        $pd_error = "";
        $price_error = "";
        $image_error = "";
        $qClass = "";
        $qError = "form-group";
        $q_error = "";
        include('view/editProduct.php');
        die();
        break;

    case'valUpdateProduct':
        include('model/valUpdateProduct.php');
        die();
        break;

    case 'viewProducts':
        $products = product_db::getAllProducts();

        include('view/allProducts.php');
        die();
        break;

    case 'viewUsers':
        $message;
        $users = user_db::select_all();
        include('view/allUsers.php');
        die();
        break;

    case 'editUser':
        $emailClass = "";
        $emailError = "form-group";
        $unClass = "";
        $unError = "form-group";
        $fnClass = "";
        $fnError = "form-group";
        $lnClass = "";
        $lnError = "form-group";
        $roleError = "form-group";
        $roleClass = "";
        $email_error = '';
        $un_error = '';
        $fn_error = '';
        $ln_error = '';
        $role_error = '';
        $roles = role_db::getAll();
        $id = filter_input(INPUT_POST, 'id');
        $user = user_db::get_user_by_id($id);
        include('view/editUser.php');
        die();
        break;

    case'valAdminUpdateUser':
        include('model/valAdminUpdateUser.php');
        die();
        break;

    case 'valUserMessage':
        include('model/valUserMessage.php');
        die();
        break;


    case 'viewUserComments':
        $comments = contact_db::getAll();
        include('view/viewUserComments.php');
        die();
        break;

    case 'addToCart':
        $id = filter_input(INPUT_POST, 'id');
        $qty = filter_input(INPUT_POST, 'quantity');
        $product = product_db::getProduct_byId($id);
        include('model/cart.php');
        die();
        break;

    case'deleteMessage':
        $id = filter_input(INPUT_POST, 'id');

        contact_db::delete($id);
        header("Location: index.php?action=viewUserComments");
        die();
        break;

    case 'viewCart':
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal = number_format($subtotal, 2);
        include('view/cart.php');
        die();
        break;

    case'deleteThread':
        $threadId = filter_input(INPUT_POST, 'threadId');
        post_db::deletePosts($threadId);
        thread_db::deleteThread($threadId);

        header("Location: index.php?action=forum");
        die();
        break;

    case 'deletePost':
        $postId = filter_input(INPUT_POST, 'postId');
        post_db::deletePost($postId);
        $threadId = filter_input(INPUT_POST, 'threadId');
        $postError = "Enter comment";
        $thread = thread_db::get_thread_byId($threadId);
        $posts = post_db::get_posts_by_threadId($threadId);
        $postCount = thread_db::getPostCount($threadId);
        $lastPost = thread_db::getLastPost($threadId);
        thread_db::setLastPost($threadId, $lastPost);
        thread_db::setPostCount($threadId, $postCount);
        include ('view/viewThread.php');

    case'viewProduct':
        $productId = filter_input(INPUT_GET, 'id');
        $product= product_db::getProduct_byId($productId);
        include('view/viewProduct.php');
        die();
        break;
    
    case'submitOrder':
        if(isset($_SESSION['user'])){
            $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal = number_format($subtotal, 2);
        $orderId= order_db::addOrder('', $_SESSION['user']->getId() , $subtotal);
        foreach ($_SESSION['cart'] as $item) {
            order_db::addOrderDetails('', $orderId, $item['id'], $item['qty']);
            
        }
        if($orderId != false){
            unset($_SESSION['cart']);
        }
        $order= order_db::getOrderById($orderId);
       
        include('view/orderSuccess.php');
        }else{
            header("Location: index.php?action=login");
        }
        
        die();
        break;
        
    case 'viewOrders':
        $orders= order_db::getUserOrders($_SESSION['user']->getId());
        include('view/userOrders.php');
        die();
        break;
    
    case'adminViewOrders':
        $orders= order_db::getAllOrders();
        include('view/adminViewOrders.php');
         die();
        break;
    
    case 'viewOrder':
        $orderId = filter_input(INPUT_GET, 'id');
        $order= order_db::getOrderById($orderId);
        $orderDetails= order_db::getOrderDetailsByOrderId($orderId);
        include('view/viewOrder.php');
         die();
        break;
        
        
}
     

