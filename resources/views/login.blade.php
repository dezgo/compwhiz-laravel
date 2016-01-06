<div id="login-status">
    <p>
        <?php
        if (Auth::check())
        {
            $user = Auth::user();
            echo 'Hi '. $user->name.'!&nbsp;';
            echo Html::link('', 'Home').'&nbsp';
            echo Html::link('/admin/invoice', 'Invoicing').'&nbsp';
            echo Html::link('/auth/logout', 'Logout');
        }
        else
        {
            echo Html::link('/auth/register', 'Register').'&nbsp';
            echo Html::link('/auth/login', 'Login');
        }
        ?>
    </p>
</div>
&nbsp;
