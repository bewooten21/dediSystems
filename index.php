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
        //set variables and send to contact
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
    //set error variables and send to register page
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
        //set error variables and send to login page
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
        //end session if logging out and send to home page
        session_destroy();
        unset($_SESSION['user']);
        header("Location: home.php");

    case 'forum':
         //get threads from DB and direct to forum
        $threads = thread_db::get_threads();
        include('view/forum.php');
        die();
        break;

    case 'viewAccount':
        
        //if user is logged in send to account
        if (isset($_SESSION['user'])) {
            $message = "";
            include('view/account.php');
            //if user isnt logged in, send to login
        } else {
             header("Location: index.php?action=login");
        }

        die();
        break;
    case 'accountInfo':
        //if user is logged in send to account
        if (isset($_SESSION['user'])) {
            
            //if user isnt logged in, send to login
            //set error variables for accountINfo/update page
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
        } else {
            header("Location: index.php?action=login");
        }
        
        die();
        break;

    case 'resetPw':
        
        //set variables for resetPw and direct to resetPw page
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
        //set variables and direct to createThread form
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
        //get threadId from thread that was clicked on in the forum
        $id = filter_input(INPUT_GET, 'id');
        //get thread information
        $thread = thread_db::get_thread_byId($id);
        //get posts associated with thread
        $posts = post_db::get_posts_by_threadId($id);
        include ('view/viewThread.php');
        die();
        break;

    case 'valPost':

        $body = filter_input(INPUT_POST, 'body');
        //store threadId so post can be saved with threadId
        $threadId = filter_input(INPUT_POST, 'threadId');
        //check if user is logged in
        if (isset($_SESSION['user'])) {
            if ($body === "") {
                $postError = "Body Required";
                //get thread and posts associated with thread
                $thread = thread_db::get_thread_byId($threadId);
                $posts = post_db::get_posts_by_threadId($thread->getId());
                //direct back to thread page if body left empty
                include ('view/viewThread.php');
            } else if ($body != "") {
                //add post to DB with threadId
                post_db::add_post('', $threadId, $_SESSION['user']->getUsername(), $body);
                //get count of posts for thread
                $postCount = thread_db::getPostCount($threadId);
                $postError = "Enter comment";
                $thread = thread_db::get_thread_byId($threadId);
                $posts = post_db::get_posts_by_threadId($threadId);
                //get last inserted post associated with threadId
                $lastPost = thread_db::getLastPost($threadId);
                //set new lastPost equal to lastPost in DB
                thread_db::setLastPost($threadId, $lastPost);
                //set new postCount
                thread_db::setPostCount($threadId, $postCount);
                include ('view/viewThread.php');
            }
        } else {
            header("Location: index.php?action=login");
        }


        die();
        break;

    case 'shop':
        //number of thumbnails in each row
        $numOfCols = 4;
        $rowCount = 0;
        //if 12 % postCount != 0---then stay on current row, otherwise move to new row
        $bootstrapColWidth = 12 / $numOfCols;
        $products = product_db::getAllProductsMore0();
        include('view/shop.php');
        die();
        break;

    case 'addProduct':
        //set variables for form
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
        //get productId from button click
        $id = filter_input(INPUT_POST, 'id');
        //get product information
        $product = product_db::getProduct_byId($id);
        //set variables
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
        //get all products from Db
        $products = product_db::getAllProducts();

        include('view/allProducts.php');
        die();
        break;

    case 'viewUsers':
        //if user is an admin or owner then show all users(only admin or owner can view this NAV option)
        if ($_SESSION['user']->getRole() === "admin" || $_SESSION['user']->getRole() === "owner") {
            $message;
            $users = user_db::select_all();
            include('view/allUsers.php');
        } else {
            header("Location: index.php?action=viewAccount");
        }

        die();
        break;

    case 'editUser':
        //set variables
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
        //get all role names and Ids
        $roles = role_db::getAll();
        //get userId from form
        $id = filter_input(INPUT_POST, 'id');
        //get user information to populate edit form
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
        //get all comments from DB
        $comments = contact_db::getAll();
        include('view/viewUserComments.php');
        die();
        break;

    case 'addToCart':
        //get productId from button click
        $id = filter_input(INPUT_POST, 'id');
        //get quantity from drop down
        $qty = filter_input(INPUT_POST, 'quantity');
        //get product information
        $product = product_db::getProduct_byId($id);
        //send this information to cart
        include('model/cart.php');
        die();
        break;

    case'deleteMessage':
        //get message ID from buttom click
        $id = filter_input(INPUT_POST, 'id');
        //delete message associated with id
        contact_db::delete($id);
        header("Location: index.php?action=viewUserComments");
        die();
        break;

    case 'viewCart':
        //set date format
        $date = date("Y-m-d");
        $dateMessage = "";
        $subtotal = 0;
        //if cart session is set then calculate total
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $subtotal += $item['total'];
            }
            $subtotal = number_format($subtotal, 2);
        }

        include('view/cart.php');
        die();
        break;

    case'deleteThread':
        //get threadId from button click
        $threadId = filter_input(INPUT_POST, 'threadId');
        //delete posts associated with thread
        post_db::deletePosts($threadId);
        //delete thread
        thread_db::deleteThread($threadId);

        header("Location: index.php?action=forum");
        die();
        break;

    case 'deletePost':
        //get postId from button click
        $postId = filter_input(INPUT_POST, 'postId');
        //delete post
        post_db::deletePost($postId);
        $threadId = filter_input(INPUT_POST, 'threadId');
        $postError = "Enter comment";
        //get thread info
        $thread = thread_db::get_thread_byId($threadId);
        //get post information to display
        $posts = post_db::get_posts_by_threadId($threadId);
        //get new post count
        $postCount = thread_db::getPostCount($threadId);
        //get last inserted postId
        $lastPost = thread_db::getLastPost($threadId);
        //set new last post
        thread_db::setLastPost($threadId, $lastPost);
        //set new post count
        thread_db::setPostCount($threadId, $postCount);
        include ('view/viewThread.php');
        die();
        break;

    case'viewProduct':
        //get productId from link
        $productId = filter_input(INPUT_GET, 'id');
        //get product info
        $product = product_db::getProduct_byId($productId);
        include('view/viewProduct.php');
        die();
        break;

    case'submitOrder':
        //get date from datepicker
        $rentalDate = filter_input(INPUT_POST, 'rentalDate');
        //change date format
        $rentalDate = date("m-d-Y", strtotime($rentalDate));
        //check if date is already booked, returns false if so 
        $checkDate = order_db::checkDate($rentalDate);
        //check if date is invalid(datepicker left blank equals 01-01-1970)
        if ($rentalDate === '01-01-1970') {
            $dateMessage = "Enter valid date";
            $date = date("Y-m-d");
            $subtotal = 0;
            //calcuate new cart total
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $subtotal += $item['total'];
                }
                $subtotal = number_format($subtotal, 2);
            }

            include('view/cart.php');
            //date is booked
        } else if ($checkDate === false) {
            $dateMessage = "Date already booked";
            $date = date("Y-m-d");
            $subtotal = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $subtotal += $item['total'];
                }
                $subtotal = number_format($subtotal, 2);
            }

            include('view/cart.php');
            //if checkdate is true then make sure user is logged in
        } else if (isset($_SESSION['user'])) {
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $item) {
                $subtotal += $item['total'];
            }
            //add order info to orders
            $subtotal = number_format($subtotal, 2);
            //check if submit order passes
            $orderId = order_db::addOrder('', $_SESSION['user']->getId(), $subtotal, 'Processing', $rentalDate);
            foreach ($_SESSION['cart'] as $item) {
                //add order details for each item in cart
                order_db::addOrderDetails('', $orderId, $item['id'], $item['qty']);
            }
            if ($orderId != false) {
                unset($_SESSION['cart']);
            }
            //get order information to allow user to click "Order Details" after success
            $order = order_db::getOrderById($orderId);

            include('view/orderSuccess.php');
        } else {
            header("Location: index.php?action=login");
        }




        die();
        break;

    case 'viewOrders':
        //get all order associated with current user, returns true if found
        $orders = order_db::getUserOrders($_SESSION['user']->getId());
        //if no orders exist
        if ($orders === false) {
            $message = "You do not currently have any orders.";
        } else {
            $message = "";
        }
        include('view/userOrders.php');
        die();
        break;

    case'adminViewOrders':
        //get ALL customer orders (admin and owner)
        $orders = order_db::getAllOrders();
        include('view/adminViewOrders.php');
        die();
        break;

    case 'viewOrder':
        //get orderId from link click
        $orderId = filter_input(INPUT_GET, 'id');
        //get order information
        $order = order_db::getOrderById($orderId);
        //get orderdetails associated with orderId
        $orderDetails = order_db::getOrderDetailsByOrderId($orderId);
        include('view/viewOrder.php');
        die();
        break;

    case'updateItemInCart':
        //get productId 
        $id = filter_input(INPUT_POST, 'id');
        //get quanitity from dropdown
        $qty = (int) filter_input(INPUT_POST, 'quantity');
        //get product info
        $product = product_db::getProduct_byId($id);
        //if item is already in cart , then update total
        if (isset($_SESSION['cart'][$id])) {
            if ($qty <= 0) {
                unset($_SESSION['cart'][$id]);
                //if new qty is 0, then remove product from cart completely and calcuate new totals and set new session 
            } else {
                unset($_SESSION['cart'][$id]['total']);
                $_SESSION['cart'][$id]['qty'] = $qty;
                $total = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
                $_SESSION['cart'][$id]['total'] = $total;
            }
        }
        header("Location: index.php?action=viewCart");
        die();
        break;

    case 'processOrder':
        //get orderId from buttonclick
        $orderId = filter_input(INPUT_POST, 'orderId');
        //set new order status
        order_db::updateOrderStatus($orderId, 'Recieved/Approved');
        header("Location: index.php?action=adminViewOrders");
        die();
        break;

    case'fullfillOrder':
        //get orderId from buttonclick
        $orderId = filter_input(INPUT_POST, 'orderId');
        //set new order status
        order_db::updateOrderStatus($orderId, 'Ready for Pickup');
        header("Location: index.php?action=adminViewOrders");
        die();
        break;





    case'cancelOrder':
        //get orderId from buttonclick
        $orderId = filter_input(INPUT_POST, 'orderId');
        //set new order status
        order_db::cancelOrder($orderId, 'CANCELLED');
        header("Location: index.php?action=viewOrders");
        die();
        break;

    case 'cancelOrderAdmin':
        //get orderId from buttonclick
        $orderId = filter_input(INPUT_POST, 'orderId');
        //set new order status
        order_db::cancelOrder($orderId, 'CANCELLED');
        header("Location: index.php?action=adminViewOrders");
        die();
        break;
}

     

