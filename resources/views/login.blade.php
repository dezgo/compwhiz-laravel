<div id="login-status">
    <p>
        <?php
        if (Auth::check())
        {
            $user = Auth::user();
            echo 'Hi '. $user->name.'!&nbsp;';
            echo Html::link('', 'Home').'&nbsp';
            echo Html::link('/admin/invoice', 'Invoicing').'&nbsp';
            echo Html::link('/logout', 'Logout');
        }
        else
        {
            echo Html::link('/register', 'Register').'&nbsp';
            echo Html::link('/login', 'Login');
        }
        ?>
    </p>
</div>
&nbsp;
