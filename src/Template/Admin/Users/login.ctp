  <div class="main_page_content" id="admin_users_login">
  <div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Sign In To Admin
        </h3>
    </div>
    <?php echo $this->Flash->render();?>
    <?php echo $this->Form->create('User', array('class' => 'm-login__form m-form login-form','id'=>'login-form')); ?>
        <div class="form-group m-form__group">
                <?php
                    echo $this->Form->input('email', [
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control m-input',
                        'type' => 'text',
                        'placeholder' => 'Email',
                        'autocomplete' => 'off'
                    ]);
                ?>
        </div>
        <div class="form-group m-form__group">
                <?php
                    echo $this->Form->input('password', [
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control m-input m-login__form-input--last',
                        'type' => 'password',
                        'placeholder' => 'Password'
                    ]);
                ?>
        </div>
        <div class="m-login__form-action">
            <button type="submit" id="m_login_signin" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn" name="login" value="login">
                Sign In
            </button>
        </div>
    <?php echo $this->Form->end();?>
</div>
</div>