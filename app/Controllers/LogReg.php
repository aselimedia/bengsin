<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UsersModel;

class LogReg extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->users = new UsersModel();
        $this->sendEmail = \Config\Services::email();
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email|is_not_unique[users.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Enter a valid email address',
                        'is_not_unique' => 'This email is not registered on our service'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[6]|max_length[12]',
                    'errors' => [
                        'required' => 'password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have characters more than 12 in length'
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userModel = new \App\Models\UsersModel();
                $user_info = $userModel->where('email', $email)->first();
                $check_password = Hash::check($password, $user_info['password']);

                if (!$check_password) {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('/login')->withInput();
                } else {
                    $user_id = $user_info['id'];
                    session()->set('loggedUser', $user_id);

                    $user = $userModel->where('email', $this->request->getVar('email'))->first();
                    $this->data($user);
                    return $this->isActive();
                }
            }
        }

        return view('logreg/login', $data);
    }

    public function isActive()
    {
        if (session()->get('is_active') == 1) {
            return redirect()->to('/')->with('success', 'Berhasil login');
        } else {
            session()->remove(['loggedUser', 'id', 'email', 'vkey', 'is_active']);
            return redirect()->to('/login')->with('fail', 'Your account has not been verified');
        }
    }

    public function data($user)
    {
        $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'vkey' => $user['vkey'],
            'is_active' => $user['is_active'],
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your full name is required'
                    ]
                ],

                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'You must enter a valid email',
                        'is_unique' => 'Email already taken'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[6]|max_length[12]',
                    'errors' => [
                        'required' => 'password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have characters more than 12 in length'
                    ]
                ],

                'cpassword' => [
                    'rules' => 'required|min_length[6]|max_length[12]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm password is required',
                        'min_length' => 'Confirm password must have atleast 6 characters in length',
                        'max_length' => 'Confirm password must not have characters more than 12 in length',
                        'matches' => 'Confirm password not matches to password'
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $vkey = md5(time() . $this->request->getPost('namadepan'));
                $isActive = 0;

                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $newData = [
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'vkey' => $vkey,
                    'is_active' => $isActive,
                    'created_date' => time(),
                ];

                $message = '<h3>Hai ' . $name . ' thank you for joining us</h3>
                <p>Please click active for activate your account : <a href="https://bengsin.id/active?email=' . $email . '&token=' . $vkey .
                    '">Active</a></p>
                <hr>
                <p color="#474747">This is an automated email. Please do not reply to this email.</p>';

                $query = $this->users->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'gagal');
                } else {
                    $this->email($email, 'Verified Email', $message);
                    return redirect()->to('/login')->with('success', 'Registration Success, Please Activate Your Email');
                }
            }
        }

        return view('logreg/register', $data);
    }

    public function forgot()
    {
        $data = [
            'title' => 'Forgot Password',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email|is_not_unique[users.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Enter a valid email address',
                        'is_not_unique' => 'This email is not registered or activated'
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getPost('email');
                $userForgot = $this->users->verifyEmail($email);
                $created = time();
                $vkey = md5(time() . $email . $created);

                $dataForgot = [
                    'email' => $email,
                    'vkey' => $vkey,
                    'created_date' => $created,
                ];

                if ($userForgot) {
                    if ($userForgot['is_active'] == 1) {
                        $message = '<h3>Password Reset</h3>
                        <p>Please click forgot for change new password : <a href="https://bengsin.id/login/reset?email=' . $email . '&token=' . $vkey .
                            '">Forgot</a></p>
                        <hr>
                        <p color="#474747">This is an automated email. Please do not reply to this email.</p>';

                        $query = $this->users->update($userForgot['id'], $dataForgot);

                        if (!$query) {
                            return redirect()->back()->with('fail', 'Something went wrong');
                        } else {
                            $this->email($email, 'Forget Password', $message);
                            return redirect()->to('/login')->with('success', 'Please check your email to reset your password!');
                        }
                    } else {
                        return redirect()->to('/login/forgot-password')->with('fail', 'This email is not registered or activated');
                    }
                } else {
                    return redirect()->to('/login/forgot-password')->with('fail', 'This email is not registered or activated');
                }
            }
        }

        return view('logreg/forgot', $data);
    }

    public function reset()
    {
        $email = $_GET['email'];
        $token = $_GET['token'];

        $data = [
            'title' => 'Change Password',
            'email' => $email,
            'token' => $token,
        ];

        $userModel = new \App\Models\UsersModel();
        $userEmail = $userModel->verifyEmail($email);
        $userToken = $userModel->verifyVkey($token);

        if ($userEmail) {
            if ($userToken) {
                if ($this->request->getMethod() == 'post') {
                    $validation = $this->validate([
                        'password' => [
                            'rules' => 'required|min_length[6]|max_length[12]',
                            'errors' => [
                                'required' => 'password is required',
                                'min_length' => 'Password must have atleast 6 characters in length',
                                'max_length' => 'Password must not have characters more than 12 in length'
                            ]
                        ],

                        'cpassword' => [
                            'rules' => 'required|min_length[6]|max_length[12]|matches[password]',
                            'errors' => [
                                'required' => 'Confirm password is required',
                                'min_length' => 'Confirm password must have atleast 6 characters in length',
                                'max_length' => 'Confirm password must not have characters more than 12 in length',
                                'matches' => 'Confirm password not matches to password'
                            ]
                        ],
                    ]);

                    if (!$validation) {
                        $data['validation'] = $this->validator;
                    } else {
                        $password = $this->request->getPost('password');

                        $userModel = new UsersModel();
                        $result = $userModel->getForget($email);

                        if ($result['email'] === $email) {
                            $newData = [
                                'id' => $result['id'],
                                'password' => Hash::make($password),
                                'vkey' => $token,
                                't' => $result
                            ];

                            // dd($newData);
                            $query = $userModel->save($newData);
                            if (!$query) {
                                return redirect()->back('/login')->with('fail', 'Something went wrong');
                            } else {
                                return redirect()->to('/login')->with('success', 'Reset password success! You can login now');
                            }
                        }
                    }
                }
            } else {
                return redirect()->to('/login')->with('fail', 'Reset password failed! Infailed token');
            }
        } else {
            return redirect()->to('/login')->with('fail', 'Reset password failed! Email not register');
        }

        return view('logreg/reset', $data);
    }

    public function email(
        $to,
        $title,
        $message
    ) {
        $this->sendEmail->setFrom('noreply@bengsin.id', 'bengsin.id');
        $this->sendEmail->setTo($to);

        $this->sendEmail->setSubject($title);
        $this->sendEmail->setMessage($message);

        if (!$this->sendEmail->send()) {
            return false;
        } else {
            return true;
        }
    }

    public function active()
    {
        $token = $_GET['token'];
        $email = $_GET['email'];

        $userModel = new \App\Models\UsersModel();
        $userEmail = $userModel->verifyEmail($email);
        $userToken = $userModel->verifyVkey($token);

        if ($userEmail) {
            if ($userToken) {
                if ($userEmail['is_active'] == 1) {
                    return redirect()->to('/login')->with('fail', 'This account invalid or already verified');
                } else {
                    $userModel->setVkey($email);
                    return redirect()->to('/login')->with('success', 'Your account has been verified! You can login now');
                }
            } else {
                return redirect()->to('/login')->with('fail', 'Account activation failed! Infailed token');
            }
        } else {
            return redirect()->to('/login')->with('fail', 'This account invalid or already verified');
        }
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove(['loggedUser', 'id', 'email', 'vkey', 'is_active', 'snapToken', 'userOrder', 'slug', 'id_mitra', 'daerah']);
            return redirect()->to('/login?access=out')->with('fail', 'You are logged out!');
        }
    }
}
