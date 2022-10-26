<?php
function CheckSuccess($status){
    if($status =='Success'){
        echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                <b>Congratulations!</b> You have successfully submitted your request!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
}

function Success(){
    echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <b>Congratulations!</b> You have successfully registered a new Student Records Assistant!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
function loginError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid username/Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
function curpassError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid Current Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }

function pError($error){
    echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <b>Error!</b> '.$error.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

function vald(){
     if(Input::exists()){
      if(Token::check(Input::get('Token'))){
         if(!empty($_POST['College'])){
             $_POST['College'] = implode(',',Input::get('College'));
         }else{
            $_POST['College'] ="";
         }
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true'
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username'=>Input::get('username'),
                        'password'=>Hash::make(Input::get('password'),$salt),
                        'salt'=>$salt,
                        'name'=> Input::get('fullName'),
                        'joined'=>date('Y-m-d H:i:s'),
                        'groups'=>1,
                        'colleges'=> Input::get('College'),
                        'email'=> Input::get('email'),
                    ));

                    $user->createC(array(
                        'checker'=> Input::get('fullName'),

                    ));
                    $user->createV(array(
                        'verifier'=> Input::get('fullName'),
                    ));

                    $user->createR(array(
                        'releasedby'=> Input::get('fullName'),

                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }

                Success();
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
            }
        }
            }else{
                return false;
            }
        }

        function logd(){
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST,array(
                        'username' => array('required'=>true),
                        'password'=> array('required'=>true)
                    ));
                    if($validation->passed()){
                        $user = new user();
                        $remember = (Input::get('remember') ==='on') ? true :false;
                        $login = $user->login(Input::get('username'),Input::get('password'),$remember);
                        if($login){
                            if($user->data()->groups == 1){
                                 Redirect::to('registrar.php');
                                echo $user->data()->groups;
                            }else if($user->data()->groups == 2){
                                 Redirect::to('registrar.php');
                                echo $user->data()->groups;
                            }else if($user->data()->groups == 3){
                                Redirect::to('dean.php');
                               echo $user->data()->groups;
                            }else if($user->data()->groups == 4){
                            Redirect::to('accounting.php');
                           echo $user->data()->groups;
                            }else if($user->data()->groups == 5){
                                Redirect::to('laboratory.php');
                               echo $user->data()->groups;
                            }else if($user->data()->groups == 6){
                                Redirect::to('library.php');
                               echo $user->data()->groups;
                            }
                            else{
                                Redirect::to('index.php');
                               echo $user->data()->groups;
                            }
                        }else{
                            loginError();
                        }
                    }else{
                        foreach($validation->errors() as $error){
                            echo $error.'<br />';
                        }
                    }
                }
            }
        }

        function isLogin(){
            $user = new user();
            if(!$user->isLoggedIn()){
                Redirect::to('adminlogin.php');
            }
        }

function profilePic(){
    $view = new view();
    if($view->getdpSRA()!=="" || $view->getdpSRA()!==NULL){
        echo "<img class='rounded-circle profpic img-thumbnail ml-3' alt='100x100' src='data:".$view->getMmSRA().";base64,".base64_encode($view->getdpSRA())."'/>";
    }else{
        echo "<img class='rounded-circle profpic img-thumbnail' alt='100x100' src='resource/img/user.jpg'/>";
    }
}

function updateProfile(){
    if(Input::exists()){
        if(!empty($_POST['College'])){
            $_POST['College'] = implode(',',Input::get('College'));
        }else{
           $_POST['College'] ="";
        }

        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true',
                'min'=>5,
                'max'=>50,
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();

                try {
                    $user->update(array(
                        'username'=>Input::get('username'),
                        'name'=> Input::get('fullName'),
                        'colleges'=> Input::get('College'),
                        'email'=> Input::get('email')
                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                Redirect::to('template.php');
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }

    }
}

function changeP(){
    if(Input::exists()){
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'password_current'=>array(
                'required'=>'true',
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            )));

            if($validate->passed()){
                $user = new user();
                if(Hash::make(Input::get('password_current'),$user->data()->salt) !== $user->data()->password){
                    curpassError();
                }else{
                    $user = new user();
                    $salt = Hash::salt(32);
                    try {
                        $user->update(array(
                            'password'=>Hash::make(Input::get('password'),$salt),
                            'salt'=>$salt
                        ));
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                    Redirect::to('template.php');
                }
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }
    }
}


function approveAccounting(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceAccounting()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveDepartment(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceDepartment()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveLibrary(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceLibrary()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveLaboratory(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceLaboratory()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveRegistrar(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceRegistrar()){
        } else{
            echo "Error in approving";
        }
    }
}

function holdRegistrar(){
    if(!empty($_GET['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_GET['hold'],$_POST['remarks']);
        if($hold->holdClearanceRegistrar()){
            echo '<script>alert("Successfully updated, please click back.")</script>';
        } else{
            echo "Error in holding";
        }
    }
}

function holdAccounting(){
    if(!empty($_GET['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_GET['hold'],$_POST['remarks']);
        if($hold->holdClearanceAccounting()){
            echo '<script>alert("Successfully updated, please click back.")</script>';
        } else{
            echo "Error in holding";
        }
    }
}

function holdDepartment(){
    if(!empty($_GET['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_GET['hold'],$_POST['remarks']);
        if($hold->holdClearanceDepartment()){
            echo '<script>alert("Successfully updated, please click back.")</script>';
        } else{
            echo "Error in holding";
        }
    }
}

function holdLibrary(){
    if(!empty($_GET['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_GET['hold'],$_POST['remarks']);
        if($hold->holdClearanceLibrary()){
            echo '<script>alert("Successfully updated, please click back.")</script>';
        } else{
            echo "Error in holding";
        }
    }
}

function holdLaboratory(){
    if(!empty($_GET['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_GET['hold'],$_POST['remarks']);
        if($hold->holdClearanceLaboratory()){
            echo '<script>alert("Successfully updated, please click back.")</script>';
        } else{
            echo "Error in holding";
        }
    }
}

function isAdmin($user){
    if($user === "1"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isRegistrar($user){
    if($user === "2"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isDean($user){
    if($user === "3"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isAccounting($user){
    if($user === "4"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isLaboratory($user){
    if($user === "5"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isLibrary($user){
    if($user === "6"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function viewAccounting(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoAccounting()){
        }
    }
}
function viewLibrary(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoLibrary()){
        }
    }
}
function viewLaboratory(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoLaboratory()){
        }
    }
}
function viewRegistrar(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoRegistrar()){
        }
    }
}
function viewDean(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoDean()){
        }
    }
}

function gradInfo(){
    if(Input::exists()){
        Redirect::to("viewGraduate.php?studentNumber=$_POST[studentNumber]&lname=$_POST[lname]");
    }
}
 ?>
