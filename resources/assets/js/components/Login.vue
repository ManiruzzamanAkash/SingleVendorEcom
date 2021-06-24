<template>
        <div v-if="!is_valid_login" class="form-content">
                <form class="form-area" method="POST">
                    <div class="hidden-msg">
                        <div v-if="message.length > 0">
                            {{ message }}
                        </div>
                    </div>
                    <div class="field">
                        <label for="email">Email address (required)</label>
                        <input id="email" ref="email" type="email" class="control-label w-100 form-control" name="email" required autofocus v-model="email" @keyup="validateLogin" v-on:keyup.13="loginUser">
                    </div>
                    <div class="field">
                        <label for="password">Password (required)</label>
                        <input id="password" ref="password" type="password" class="w-100 form-control" name="password" required v-model="password" @keyup="validateLogin" v-on:keyup.13="loginUser">
                    </div>
                    <div class="field forget">
                        <a :href="url+'/password/reset'">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="field login">
                        <button type="button" class="login-btn" @click="loginUser">{{ login_text }}</button>
                    </div>
                    <div class="field register">
                        <div class="notice">
                            Don't have an account?
                        </div>
                        <a :href="url+'/register'" class="create-btn">Create an Account</a>
                    </div>
                </form>
        </div>
        <div v-else>
            <h3>Login Successsfull !!</h3>
            <div class="theme-card">
                <div class="alert alert-success">
                        {{ message }}
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: {
            url: {
              type: String,
              required: true
          }
      },
      data(){
        return {
          email: '',
          password: '',
          remember: '',
          is_valid_login: false,
          message: '',
          login_text: 'Login'
      }
  },
  methods: {
    loginUser(){
      var app = this;

      app.login_text = "Logging in...";
      if (!app.validateLogin()) {
        app.login_text = "Login";
    }else{
        app.message = ''
        axios.post(app.url+'/api/login', {
            email: app.email,
            password: app.password,
            remember: app.remember,
        })
        .then((response) => {
            var is_success = response.data.success;
            var is_redirect = response.data.redirect;
            app.message = response.data.message;

            if (is_success) {
                app.is_valid_login = true;
                if (is_redirect) {
                    window.location.href= app.url;
                }
                
            }else{
                app.login_text = "Login";
            }


        })
        .catch((e) => {
            console.log(e);
        })
    }


},
validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
},

validateLogin(){
    var app = this;
    var is_valid = false;
    if (app.validateEmail(app.email)) {
        app.message = '';
        if (app.password.length >= 6) {
            is_valid = true;
            app.message = '';
        }else{
            app.message = 'Password should be more than or equal 6 characters';
            is_valid = false;
        }
    }else{
        app.message = 'Invalid email or password !!';
        is_valid = false;
    }
    return is_valid;
}
}
}
</script>
