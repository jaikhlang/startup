<?php

return [

    /*
    |-----------------------------------------------------
    | This is the translation file for StartUp 5.3
    |-----------------------------------------------------
    |
    | The following language lines are used is StartUp 5.3
    |
    */

    /* General */
    'password'              => 'Password',
    'password_current'      => 'Current Password',
    'password_new'          => 'New Password',
    'password_confirm'      => 'Confirm Password',
    'password_confirm_new'  => 'Confirm New Password',
    'email'                 => 'E-mail Address',
    'name'                  => 'Name',
    'update'                => 'Update',
    'created'               => 'Created',
    'yes'                   => 'Yes',
    'no'                    => 'No',
    'name'                  => 'Name',
    'activated'             => 'Activated',
    'status'                => 'Status',
    'role'                  => 'Role',
    'roles'                 => 'Roles',
    'online'                => 'Online',
    'offline'               => 'Offline',
    'close'                 => 'Close',
    'delete'                => 'Delete',
    'id'                    => 'Id',
    'cancel'                => 'Cancel',
    'permission'            => 'Permission',
    'permissions'           => 'Permissions',
    'type'                  => 'Type',
    'date'                  => 'Date',
    'size'                  => 'Size',
    'action'                => 'Action',
    'folder'                => 'Folder',
    'time'                  => 'Time',
    'save'                  => 'Save',

    /* Notifications */
    'notifications' => [
        'login' => [
            'welcome'                    => 'Welcome, :user. You have been logged in',
            'logout'                     => 'You have been logged out, bye!',
            'authy_token'                => 'Validate your two-factor authentication token',
            'authy_button'               => 'Verify Token',
        ],
        'register' => [
            'confirm_account'           => 'You need to confirm your account. We have sent you an activation code, please check your email',
            'activation_code'           => 'We sent you an activation code. Check your email',
        ],
        'profile' => [
            'contact_info'              => 'Contact Information successfully updated',
            'password_update'           => 'Password successfully updated',
            'profile_photo'             => 'Profile Photo successfully updated',
            'authy_token'               => 'Invalid two-factor authentication token provided!',
            'authy_enabled'             => 'Two-factor authentication has been enabled!',
            'authy_disabled'            => 'Two-factor authentication has been disabled!',
        ],
        'admin_users' => [
            'created'                   => 'User successfully created',
            'updated'                   => 'User successfully updated',
            'deleted'                   => 'User successfully deleted',
        ],
        'admin_settings' => [
            'updated'                   => 'Settings successfully updated',
        ],
        'admin_roles' => [
            'created'                   => 'Role successfully created',
            'updated'                   => 'Role successfully updated',
            'deleted'                   => 'Role successfully deleted',
        ],
        'admin_permissions' => [
            'created'                   => 'Permission successfully created',
            'updated'                   => 'Permission successfully updated',
            'deleted'                   => 'Permission successfully deleted',
        ],
        'admin_backup' => [
            'created'                   => 'Backup successfully created',
        ],
        'contactform' => [
            'created'                   => 'Thank you for your message. We will get back to you soon',
        ],
    ],

    /* Languages */
    'norwegian'     => 'Norwegian',
    'english'       => 'English',

    /* Pages */
    'pages' => [
        'home' => [
            'title'                     => 'Home',
            'dashboard'                 => 'Dashboard',
            'welcome'                   => 'You are logged in, welcome!',
            'read_role_user'            => 'If you can reed this, then you have the User Role',
            'read_role_moderator'       => 'If you can reed this, then you have the Moderator Role',
            'read_role_administrator'   => 'If you can reed this, then you have the Administrator Role',
        ],
        'contact' => [
            'title'                     => 'Contact Form',
            'subject'                   => 'Subject',
            'message'                   => 'Message',
            'send'                      => 'Send Message',
        ],
        'profile' => [
            'title'                 => 'My profile',
            'profile_photo'         => 'Profile Photo',
            'contact_info'          => 'Contact Informasjon',
            'change_photo'          => 'Select new Photo',
            'authy_message'         => 'To use 2-factor Authentication, you <b>MUST</b> install Authy on your phone.',
            'authy_disable'         => 'Disable 2-factor Authentication',
            'country'               => 'Country',
            'cellphone'             => 'Cellphone',
            'authy_sms'             => 'Send two-factor token via SMS',
            'authy_invalid'         => 'The provided phone information is invalid.',
            'authy_delete'          => 'Unable to Delete User',
        ],
        'admin_dashboard' => [
            'title'                 => 'Dashboard',
            'welcome'               => 'You are now viewing the admin section!',
        ],
        'admin_users' => [
            'title'                 => 'Users',
            'status_text'           => 'Status indicates a user online/offline for the last 5 minutes.',
            'profile_photo'         => 'Profile Photo',
            'create_user'           => 'Create User',
            'edit_user'             => 'Edit user',
            'delete_user'           => 'Delete User',
            'delete_confirm'        => 'Are you sure you want to delete this user?',
        ],
        'admin_permissions' => [
            'title'                 => 'Permissions',
            'create_permissions'    => 'Create Permission',
            'edit_permission'       => 'Edit Permission',
            'delete_permission'     => 'Delete permission',
            'delete_confirm'        => 'Are you sure you want to delete this permission?',
        ],
        'admin_roles' => [
            'title'                 => 'Roles',
            'create_role'           => 'Create Role',
            'edit_role'             => 'Edit Role',
            'delete_role'           => 'Delete Role',
            'delete_confirm'        => 'Are you sure you want to delete this role?',
        ],
        'admin_uploads' => [
            'title'                 => 'Uploads',
            'new_folder'            => 'New Folder',
            'upload'                => 'Upload',
            'upload_new'            => 'Upload New File',
            'file'                  => 'File',
            'optional'              => 'Optional Filename',
            'upload_file'           => 'Upload File',
            'create_folder'         => 'Create Folder',
            'create_new_folder'     => 'Create New Folder',
            'folder_name'           => 'Folder Name',
            'uploads_message'       => 'All files will be stored in public/uploads folder',
            'delete_file_confirm'   => 'Please Confirm',
            'delete_message'        => 'Are you sure you want to delete the',
            'file'                  => 'file?',
            'folder'                => 'folder?',
            'delete_file'           => 'Delete file',
            'delete_folder'         => 'Delete folder',
            'image_prew'            => 'Image Preview',
        ],
        'admin_settings' => [
            'settings'              => 'Settings',
            'global'                => 'Global',
            'title'                 => 'Title',
            'url'                   => 'URL',
            'timezone'              => 'Timezone',
            'settings_text'         => 'These settings are taken from config\app.php',
        ],
        'admin_activity' => [
            'activity'              => 'Activity',
            'who'                   => 'Who',
            'activity_log'          => 'Activity log',
        ],
        'admin_backup' => [
            'backup'                => 'Backup',
            'backupfiles'           => 'Backupfiles',
            'take_backup'           => 'Take Backup',
            'message'               => 'All files will be stored in public/backups folder. This is not the most secure place to stor backups. So change this to S3 or to another location.',
        ],
        '404' => [
            '404'                   => 'Error 404: The page you are looking for could not be found.',
            'button'                => 'Return home',
        ],
    ],

    /* NAV */
    'nav' => [
        'front' => [
            'home'          => 'Home',
            'contact'       => 'Contact',
            'login'         => 'Login',
            'register'      => 'Register',
            'language'      => 'Language',
            'profile'       => 'My Profile',
            'admin'         => 'Admin',
            'logout'        => 'Logout',
        ],
        'back' => [
            'administration'    => 'Administration',
            'dashboard'         => 'Dashboard',
            'users'             => 'Users',
            'roles'             => 'Roles',
            'permissions'       => 'Permissions',
            'uploads'           => 'Uploads',
            'settings'          => 'Settings',
            'global'            => 'Global',
            'activity'          => 'Activity',
            'backup'            => 'Backup',
        ],
        'profile' => [
            'profile'          => 'My Profile',
            'security'         => 'Security',
            'settings'         => 'Settings',
        ],
    ],

    /* Login page */
    'auth' => [
        'login' => [
            'remember_me'       => 'Remember Me',
            'login'             => 'Login',
            'forgot_password'   => 'Forgot Your Password?',
        ],

        /* Register page */
        'register' => [
            'register'          => 'Register',
        ],

        /* Password reset page */
        'password_reset' => [
            'reset'          => 'Reset Password',
            'send_password'  => 'Send Password Reset Link',
        ],
    ],

    /* Emails */
    'emails' => [
        'activation' => [
            'title'             => 'Please activate your account.',
            'message'           => 'We may need to send you critical information about our service and it is important that we have an accurate email address.',
            'button'            => 'Activate account',
        ],
        'contactform' => [
            'title'             => 'has send you a new message from contact form.',
            'subject'           => 'Subject',
            'message'           => 'Message',
        ],
    ],

    /* Footer */
    'built_with'    => 'Built with',
    'and'           => 'and',
    'version'       => 'Version',
];
