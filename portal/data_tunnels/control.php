<?PHP
//imports
require_once '../database/db_conn.php';
require_once './punch/user_functions.php';
require_once './punch/inventory_functions.php';
require_once './punch/request_functions.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

switch ($_POST['form_code']) {

    case '000-0': //USER CONTROLS

        $user_fun = new UserFunctions($connection);

        $user_fun->pushNewUserData(
            $_POST['u_name'],
            $_POST['f_name'],
            $_POST['l_name'],
            $_POST['contact_number'],
            $_POST['password'],
            $_POST['role_code']
        );

    break;

    case '000-1': 

        $user_fun = new UserFunctions($connection);

        $user_fun->deleteUserData(
            $_POST['user_name']
        );

    break;

    case '001-0': //INVENTORY CONTROLS

        $inv_fun = new InventoryFunctions($connection);

        $inv_fun->pushNewItemData(
            $_POST['item_name'],
            $_POST['unit_type'],
            $_POST['quantity'],
            $_POST['in_stock'],
            $_POST['date_dlvd'],
            $_POST['out_stock'],
            $_POST['item_category']
        );

    break;

    case '002-0': //REQUEST CONTROLS

        $req_fun = new RequestFunctions($connection);

        $req_fun->pushNewRequestData(
            $_POST['item_name'],
            $_POST['quantity_request'],
            $_POST['justification'],
            $_POST['user_id']
        );

    break;
    
    default:
        echo '<h1 style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
                ERROR CODE: "BRO" - this means your request is invalid and isn&apos;t here
            </h1>';

        echo '<script>
                setTimeout(function() {
                    window.location.href = "./../../404.php";
                }, 3000);
              </script>';
    break;

}

?>
