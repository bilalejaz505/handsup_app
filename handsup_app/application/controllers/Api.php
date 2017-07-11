<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->library('File_upload');

    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function countries()
    {
        $response = array();

        $response = $this->Api_model->getAll('countries');

        echo json_encode($response);
        exit;

    }

    public function cities()
    {
        $response = array();

        $country_code = $this->input->get('code');

        $response = $this->Api_model->getMutipleRows('city', 'countrycode', $country_code);

        echo json_encode($response);
        exit;

    }

    public function userInterests()
    {
        $response = array();

        $user_id = $this->input->get('user_id');

        $response = $this->Api_model->getInterestByUserId($user_id);

        echo json_encode($response);
        exit;

    }

    public function register()
    {
        $data = $this->input->get();

        $checkEmail = $this->Api_model->getMutipleRows('users', 'email', $data['email']);

        if (count($checkEmail) > 0) {
            $response['message'] = 'Email already exist.';

            $response['success'] = '0';

            echo json_encode($response);
            exit;
        }

        $data['password'] = md5($data['password']);

        $user = $this->Api_model->insert('users', $data);

        $response['message'] = 'User registered successfully.';

        $response['success'] = '1';

        $response['user_id'] = $user;

        echo json_encode($response);
        exit;

    }

    public function login()
    {
        $response = array();
        $data['email'] = $this->input->get('email');
        $data['password'] = md5($this->input->get('password'));

        $user = $this->Api_model->login($data);

        if ($user) {
            if ($user['status'] == 0) {
                $response['success'] = '0';
                $response['message'] = 'Sorry this account is suspended.';
                echo json_encode($response);
                exit;
            }
            $getBy['user_id'] = $user['id'];
            $interest = $this->Api_model->getRowsCount('user_interests', $getBy);
            if ($interest > 0) {
                $user['has_interests'] = 1;
            } else {
                $user['has_interests'] = 0;
            }
            $skills = $this->Api_model->getRowsCount('user_skills', $getBy);
            if ($skills > 0) {
                $user['has_skills'] = 1;
            } else {
                $user['has_skills'] = 0;
            }
            $languages = $this->Api_model->getRowsCount('user_languages', $getBy);
            if ($languages > 0) {
                $user['has_languages'] = 1;
            } else {
                $user['has_languages'] = 0;
            }
            $response['success'] = '1';
            $response['message'] = 'User logged in successfully.';
            $response['user'] = $user;
        } else {
            $response['success'] = '0';
            $response['message'] = 'Invalid username or password.';

        }

        echo json_encode($response);
        exit;

    }

    public function uploadImage()
    {
        $response = array();
        $user_id = $this->input->post('user_id');


        //mail('usmanmazhar51@gmail.com', $user_id, json_encode($_FILES));

        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        if ($_FILES["image"]["name"] != '') {
            $file_name = $_FILES["image"]["name"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                /*if(!file_exists("uploads/users/".$file_name))
                {
                    move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"],"uploads/users/".$file_name);
                    $data['image_url'] = base_url().'uploads/users/'.$file_name;
                }
                else
                {*/
                $filename = basename($file_name, $ext);
                $newFileName = $filename . time() . "." . $ext;
                move_uploaded_file($file_tmp = $_FILES["image"]["tmp_name"], "uploads/users/" . $newFileName);
                $data['image_url'] = base_url() . 'uploads/users/' . $newFileName;
                //}
            } else {
                array_push($error, "$file_name, ");
            }
        }

        $update = $this->Api_model->updateRow('users', $data, 'id', $user_id);

        $response['success'] = '1';
        $response['message'] = 'Image uploaded successfully.';

        echo json_encode($response);
        exit;

    }

    public function interests()
    {
        $response = array();

        $response = $this->Api_model->getAll('interests');

        echo json_encode($response);
        exit;

    }

    public function categories()
    {
        $response = array();

        $response = $this->Api_model->getAll('categories');

        echo json_encode($response);
        exit;

    }


    public function languages()
    {
        $response = array();

        $response = $this->Api_model->getAll('languages');

        echo json_encode($response);
        exit;

    }


    public function skills()
    {
        $response = array();

        $response = $this->Api_model->getAll('skills');

        echo json_encode($response);
        exit;

    }

    public function saveInterests()
    {
        $data['user_id'] = $this->input->get('user_id');

        $interests = explode(',', $this->input->get('interest_ids'));

        foreach ($interests as $interest_id) {
            $data['interest_id'] = $interest_id;
            $count = $this->Api_model->getRowsCount('user_interests', $data);
            if ($count > 0) {
                continue;
            }
            $user = $this->Api_model->insert('user_interests', $data);
        }

        $response['message'] = 'Interest saved successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    public function saveSkillsLanguages()
    {
        $data['user_id'] = $this->input->get('user_id');

        $languages = explode(',', $this->input->get('language_ids'));

        $skills = explode(',', $this->input->get('skill_ids'));

        foreach ($languages as $language_id) {
            $data['language_id'] = $language_id;
            $count = $this->Api_model->getRowsCount('user_languages', $data);
            if ($count > 0) {
                continue;
            }
            $user = $this->Api_model->insert('user_languages', $data);
        }

        unset($data['language_id']);

        foreach ($skills as $skill_id) {
            $data['skill_id'] = $skill_id;
            $count = $this->Api_model->getRowsCount('user_skills', $data);
            if ($count > 0) {
                continue;
            }
            $user = $this->Api_model->insert('user_skills', $data);
        }

        $response['message'] = 'Skills and Languages saved successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    public function forgotPassword()
    {
        $search['email'] = $this->input->get('email');

        $countRow = $this->Api_model->getRowsCount('users', $search);

        if ($countRow == 1) {
            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
            $max = strlen($characters) - 1;
            for ($i = 0; $i < 25; $i++) {
                $string .= $characters[mt_rand(0, $max)];
            }
            $data['varification_code'] = $string;
            $update = $this->Api_model->updateRow('users', $data, 'email', $search['email']);

            $user = $this->Api_model->getSingleRow('users', $search);


            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";

            $message = 'Hi ' . $user->full_name . '<br /><br /> Please use the following URL to change your password. <br />' . base_url() . 'forgotpassword/index/' . $string;


            mail($search['email'], 'Forgot Password', $message, $headers);
            $response['message'] = "Email sent to your email account.";
            $response['success'] = '1';
        } else {
            $response['message'] = "Email doesn't exist.";
            $response['success'] = '0';
        }


        echo json_encode($response);
        exit;

    }

    public function createProject()
    {
        $data = $this->input->post();

        $language_ids = $data['language_ids'];
        $skill_ids = $data['skill_ids'];

        unset($data['language_ids']);
        unset($data['skill_ids']);
        unset($data['image_count']);

        //mail('usmanmazhar51@gmail.com', 'Check Image array', $_FILES);

        $project_id = $this->Api_model->insert('projects', $data);

        $languages = explode(',', $language_ids);

        foreach ($languages as $language_id) {
            $dataLang['project_id'] = $project_id;
            $dataLang['language_id'] = $language_id;
            $count = $this->Api_model->getRowsCount('project_languages', $dataLang);
            if ($count > 0) {
                continue;
            }
            $language = $this->Api_model->insert('project_languages', $dataLang);
        }

        $skills = explode(',', $skill_ids);

        foreach ($skills as $skill_id) {
            $dataSkill['project_id'] = $project_id;
            $dataSkill['skill_id'] = $skill_id;
            $count = $this->Api_model->getRowsCount('project_skills', $dataSkill);
            if ($count > 0) {
                continue;
            }
            $skill = $this->Api_model->insert('project_skills', $dataSkill);
        }
        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        for ($i = 1; $i <= $this->input->post('image_count'); $i++) {
            if ($_FILES["image" . $i]["name"] != '') {
                $file_name = $_FILES["image" . $i]["name"];
                $file_tmp = $_FILES["image" . $i]["tmp_name"];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    $filename = basename($file_name, $ext);
                    $newFileName = $filename . $i . time() . "." . $ext;
                    move_uploaded_file($file_tmp = $_FILES["image" . $i]["tmp_name"], "uploads/project/" . $newFileName);

                    $prjects_image['image_name'] = base_url() . 'uploads/project/' . $newFileName;
                    $prjects_image['project_id'] = $project_id;
                    $prjects_image['user_id'] = $data['user_id'];
                    $image = $this->Api_model->insert('project_images', $prjects_image);
                } else {
                    array_push($error, "$file_name, ");
                }
            }
        }
        /*if ($_FILES['image']['name'][0] != '') {
            $config_array['path']          = 'uploads/project/';
            $config_array['thumb_path']    = 'uploads/project/thumbs/';
            $config_array['height']        = '300';
            $config_array['width']         = '300';
            $config_array['field']         = 'image';
            $config_array['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
            $images                        = $this->file_upload->uploadFiles($config_array);
            if ($images) {
                $i = 0;
                foreach ($images as $image) {
                    $prjects_image['project_id']     = $project_id;
                    $prjects_image['image_name']      = base_url().'uploads/project/'.$image;
                    $prjects_image['user_id'] = $data['user_id'];
                    $image = $this->Api_model->insert('project_images', $prjects_image);
                }
            }
        }*/

        $response['message'] = 'Project created successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    function projectDetail()
    {
        $project_id = $this->input->get('project_id');
        $user_id = $this->input->get('user_id');
        $response = $this->Api_model->getProjectDetail($project_id);
        $response['languages'] = $this->Api_model->getProjectLanguages($project_id);
        $response['skills'] = $this->Api_model->getProjectSkills($project_id);
        $response['images'] = $this->Api_model->getMutipleRows('project_images', 'project_id', $project_id);
        $response['videos'] = $this->Api_model->getMutipleRows('project_videos', 'project_id', $project_id);
        $response['activities'] = $this->Api_model->getProjectActivities($project_id);
        $response['voulnteer_image'] = $this->Api_model->getProjectDetailImage($project_id, $response['user_id']);
        if ($user_id) {
            //$response['user'] = $this->Api_model->get('users', $user_id, true);
            if ($response['user_id'] == $user_id) {
                $response['user']['created_project'] = 'Yes';
                $response['user']['joined'] = 'Yes';
            } else {
                $checkUser = $this->Api_model->getProjectUser($project_id, $user_id);
                if ($checkUser) {
                    $response['user']['created_project'] = 'No';
                    $response['user']['joined'] = 'Yes';
                } else {
                    $response['user']['created_project'] = 'No';
                    $response['user']['joined'] = 'No';
                }
            }

        }
        echo json_encode($response);
        exit;

    }

    public function saveProjectReport()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['project_id'] = $this->input->get('project_id');

        $user = $this->Api_model->insert('report_project', $data);

        $response['message'] = 'Your report saved successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    function projectList()
    {
        $data = $this->input->get();

        $result = $this->Api_model->getProjectList($data);

        foreach ($result as $res) {
            if ($data['user_id'] != '') {
                $search['user_id'] = $data['user_id'];
                $search['project_id'] = $res['id'];
                $likes = $this->Api_model->getSingleRow('project_likes', $search);
                if ($likes) {
                    $res['user_liked'] = $likes->like;
                } else {
                    $res['user_liked'] = 0;
                }
            } else {
                $res['user_liked'] = 0;
            }
            $res['user_images'] = $this->Api_model->getProjectUserImages($res['id']);
            $res['languages'] = $this->Api_model->getProjectLanguages($res['id']);
            $res['skills'] = $this->Api_model->getProjectSkills($res['id']);
            $res['images'] = $this->Api_model->getMutipleRows('project_images', 'project_id', $res['id']);
            $res['videos'] = $this->Api_model->getMutipleRows('project_videos', 'project_id', $res['id']);
            $res['activities'] = $this->Api_model->getProjectActivities($res['id']);

            $response[] = $res;
        }

        echo json_encode($response);
        exit;

    }

    function searchProject()
    {
        $data = $this->input->get();

        $response = $this->Api_model->getSearchProject($data);

        echo json_encode($response);
        exit;

    }

    function getUserDraftedProject()
    {
        $fetch_by['user_id'] = $this->input->get('user_id');
        $response = $this->Api_model->getDraftedProjectDetail();
        if ($response) {
            $project_id = $response['id'];
            $response['languages'] = $this->Api_model->getProjectLanguages($project_id);
            $response['skills'] = $this->Api_model->getProjectSkills($project_id);
            $response['images'] = $this->Api_model->getMutipleRows('project_images', 'project_id', $project_id);
            $response['videos'] = $this->Api_model->getMutipleRows('project_videos', 'project_id', $project_id);
            $response['activities'] = $this->Api_model->getProjectActivities($project_id);
            if ($user_id) {
                //$response['user'] = $this->Api_model->get('users', $user_id, true);
                if ($response['user_id'] == $user_id) {
                    $response['user']['created_project'] = 'Yes';
                    $response['user']['joined'] = 'Yes';
                } else {
                    $checkUser = $this->Api_model->getProjectUser($project_id, $user_id);
                    if ($checkUser) {
                        $response['user']['created_project'] = 'No';
                        $response['user']['joined'] = 'Yes';
                    } else {
                        $response['user']['created_project'] = 'No';
                        $response['user']['joined'] = 'No';
                    }
                }

            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;

    }

    function searchPeople()
    {
        $data = $this->input->get();

        $results = $this->Api_model->getUsersList($data);

        $response = array();

        $i = 0;
        foreach ($results as $res) {
            $response[$i] = $res;
            $response[$i]['interests'] = $this->Api_model->getUserInterests($res['id']);
            $response[$i]['languages'] = $this->Api_model->getUserLanguages($res['id']);
            $response[$i]['skills'] = $this->Api_model->getUserSkills($res['id']);
            $i++;
        }


        echo json_encode($response);
        exit;

    }

    public function invitePeople()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['project_id'] = $this->input->get('project_id');
        $data['invitee_id'] = $this->input->get('invitee_id');

        $user = $this->Api_model->insert('project_invitees', $data);

        $response['message'] = 'Your invitation has been sent.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    public function updateDraftedProject()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['project_id'] = $this->input->get('project_id');
        $status = $this->input->get('status');

        if ($status == 1) {
            $proData['active_status'] = 1;
            $projectId = $this->Api_model->updateRow('projects', $proData, 'id', $data['project_id']);
        } elseif ($status == 2) {

            $deleted = $this->Api_model->deleteRow('projects', $data['project_id']);
        }

        $response['message'] = 'Project Updated Successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    public function likeProject()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['project_id'] = $this->input->get('project_id');

        $count_likes = $this->Api_model->getRowsCount('project_likes', $data);


        if ($count_likes > 0) {
            $update['like'] = $this->input->get('like');
            $this->Api_model->update('project_likes', $update, $data);
        } else {
            $data['like'] = $this->input->get('like');
            $this->Api_model->insert('project_likes', $data);
        }
        $response['message'] = 'Feedback saved successfully.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    public function joinProject()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['project_id'] = $this->input->get('project_id');

        $count_likes = $this->Api_model->getRowsCount('project_users', $data);


        if ($count_likes > 0) {
        } else {
            $this->Api_model->insert('project_users', $data);
        }
        $response['message'] = 'User is now a member of this project.';

        $response['success'] = '1';

        echo json_encode($response);
        exit;

    }

    // Bilal's Work Start
    public function getCurrentUserProfile()
    {
        $user_id = $this->input->get('userID');
        $response['user_info'] = $this->Api_model->getUserInfo($user_id);
        $response['created_projects'] = $this->Api_model->getUserCreatedProjects($user_id);
        $response['joined_projects'] = $this->Api_model->getUserJoinedProjects($user_id);
        $response['interests'] = $this->Api_model->getInterestByUserId($user_id);
        $response['skills'] = $this->Api_model->getUserSkills($user_id);
        $response['languages'] = $this->Api_model->getUserLanguages($user_id);
        echo json_encode($response);
        exit;
    }

    public function editProfile()
    {
        $inputs = $this->input->get();
        $data['full_name'] = $inputs['full_name'];
        $data['age'] = $inputs['age'];
        $data['country'] = $inputs['countryID'];
        $data['city'] = $inputs['cityID'];
        if (isset($inputs['phone'])) {
            $data['phone'] = $inputs['phone'];
        }


        $data['gender'] = $inputs['gender'];

        $updated = $this->Api_model->updateRow('users', $data, 'id', $inputs['user_id']);

        $response['success'] = '1';
        $response['message'] = 'Data updated successfully.';
        echo json_encode($response);
        exit;
    }

    public function addRemoveFriend()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['friend_id'] = $this->input->get('friend_id');
        $status = $this->input->get('status'); // 1 for add, 0 for remove
        $count = $this->Api_model->getRowsCount('user_friends', $data);
        if ($status == '1') // saving friend
        {
            if ($count > 0) {
                $response['success'] = '0';
                $response['message'] = 'Already a friend.';
                echo json_encode($response);
                exit;
            } else {
                $saved = $this->Api_model->insert('user_friends', $data);
                if ($saved) {
                    $response['success'] = '1';
                    $response['message'] = 'Friend added successfully.';
                    echo json_encode($response);
                    exit;
                } else {
                    $response['success'] = '0';
                    $response['message'] = 'Friend not added.';
                    echo json_encode($response);
                    exit;
                }
            }

        } elseif ($status == '0') { // removing friend
            if ($count > 0) {
                $deleted = $this->Api_model->deleteRowWhere('user_friends', $data);
                if ($deleted) {
                    $response['success'] = '1';
                    $response['message'] = 'Friend removed successfully.';
                    echo json_encode($response);
                    exit;
                } else {
                    $response['success'] = '0';
                    $response['message'] = 'Friend not removed.';
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response['success'] = '0';
                $response['message'] = 'Already not friends.';
                echo json_encode($response);
                exit;
            }
        }
    }

    public function getProfile()
    {
        $data['user_id'] = $this->input->get('userID');
        $data['friend_id'] = $this->input->get('searched_user_id');
        $count = $this->Api_model->getRowsCount('user_friends', $data);
        if ($count > 0) {
            $friends = 1;
        } else {
            $friends = 0;
        }

        $response['user_info'] = $this->Api_model->getUserInfo($data['friend_id']);
        $response['created_projects'] = $this->Api_model->getUserCreatedProjects($data['friend_id']);
        $response['joined_projects'] = $this->Api_model->getUserJoinedProjects($data['friend_id']);
        $response['interests'] = $this->Api_model->getInterestByUserId($data['friend_id']);
        $response['skills'] = $this->Api_model->getUserSkills($data['friend_id']);
        $response['languages'] = $this->Api_model->getUserLanguages($data['friend_id']);
        $response['is_friend'] = $friends;
        echo json_encode($response);
        exit;
    }

    public function createMessage()
    {
        $data['sender_id'] = $this->input->get('sender_id');
        $data['receiver_id'] = $this->input->get('receiver_id');
        $data['message'] = $this->input->get('message');
        $data['created_at'] = date('Y-m-d H:i:s');
        $saved = $this->Api_model->insert('user_messages', $data);
        if ($saved) {
            $response['success'] = '1';
            $response['message'] = 'Message sent successfully.';
            echo json_encode($response);
            exit;
        } else {
            $response['success'] = '0';
            $response['message'] = 'Message not sent.';
            echo json_encode($response);
            exit;
        }
    }

    public function getAllMessages()
    {
        $data['sender_id'] = $this->input->get('sender_id');
        $data['receiver_id'] = $this->input->get('receiver_id');
        $messages = $this->Api_model->getMultipleRows('user_messages', $data);
        echo json_encode($messages);
        exit;
    }

    public function logout()
    {
        $search['id'] = $this->input->get('user_id');
        $search['device_UDID'] = $this->input->get('device_id');

        $updated = $this->Api_model->update('users', array('device_UDID' => ''), $search);
        $response['success'] = '1';
        $response['message'] = 'Logged out successfully.';
        echo json_encode($response);
        exit;
    }

}
