<style scoped>
.required-icon{
    font-size: 16px;
    color: #f30a0a;
}
</style>

<template>
    <div class="">
        <!-- <div class="alert alert-danger" v-if="errors"> </div> -->
            <form @submit.prevent="submitForm">

                <div class="" v-if="submitStatus == 'OK'">

                    <div class="text-center titleArea">
                        You are successfully registered
                    </div>
                    <div class="startNote">
                        You are now a customer of us. You can now search your favorite products and buy with some very easy steps !!
                    </div>
                    <div class="text-success information">
                        <i class="fa fa-info-circle"></i> An email has sent to you. Please check and verify your email address.
                    </div>
                    <div class="goToMail">
                        <div class="mailServices">
                            <a :href="'https://www.gmail.com'">
                                <i class="fa fa-google icons" aria-hidden="true"></i>
                                <div class="service-name">Gmail</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="alert alert-danger" v-if="submitStatus === 'ERROR'">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Please correct the error</p>
                    <ul>
                       <li v-for="sError in serverErrors">
                           <i class="fa fa-warning"></i>  {{ sError[0] }}
                       </li>
                   </ul>
               </div>
               <div class="" v-if="submitStatus != 'OK'">
                <div class="titleArea">
                    Create New Account
                </div>
                <div class="form-group row">
                    <div class="col-md-6 form-field">
                        <label for="first_name" class="col-form-label">Your First Name 
                            <span class="required-icon">*</span>
                        </label>
                        <input type="text"
                        v-model.trim="$v.first_name.$model"
                        class="form-control" 
                        :class="{' is-invalid': $v.first_name.$error}"
                        id="first_name" 
                        name="first_name" 
                        autofocus="true" 
                        placeholder="Write Your First Name">
                        <div v-if="$v.first_name.$error" class="text-danger">
                            <span><i class="fa fa-warning"></i></span>
                            <span v-if="!$v.first_name.required"> Please give your first name
                                <span class="required-icon">*</span>
                            </span>
                            <span v-if="!$v.first_name.minLength"> 
                                First name will be greater than or equal 3 characters
                            </span>
                            <span v-if="!$v.first_name.maxLength"> 
                                First name will be less than or equal 20 characters
                            </span>
                        </div>
                        <div v-else-if="first_name == ''"></div>
                        <div v-else>
                            <i class="fa fa-check text-success"></i>
                        </div>
                    </div>
                    <div class="col-md-6 form-field">
                        <label for="last_name" class="col-form-label">Your Last Name <span class="required-icon">&nbsp;</span></label>
                        <input type="text"
                        v-model.trim="$v.last_name.$model"
                        class="form-control" 
                        :class="{' is-invalid': $v.last_name.$error}"
                        id="last_name" 
                        name="last_name" 
                        placeholder="Write Your Last Name">
                        <div v-if="$v.last_name.$error" class="text-danger">
                            <span><i class="fa fa-warning"></i></span>
                            <span v-if="!$v.last_name.minLength"> 
                                Last name will be greater than or equal 3 characters
                            </span>
                            <span v-if="!$v.last_name.maxLength"> 
                                Last name will be less than or equal 15 characters
                            </span>
                        </div>
                        <div v-else-if="last_name == ''"></div>
                        <div v-else>
                            <i class="fa fa-check text-success"></i>
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-md-6 form-field">
                        <label for="email" class="col-form-label">Your Email address
                            <span class="required-icon">*</span>
                        </label>
                        <input type="text"
                        v-model.trim="$v.email.$model"
                        class="form-control" 
                        :class="{' is-invalid': $v.email.$error || emailStatus === 'error'}"
                        id="email" 
                        name="email" 
                        placeholder="Write Your Email address" />
                        <div v-if="$v.email.$error" class="text-danger">
                            <span><i class="fa fa-warning"></i></span>
                            <span v-if="!$v.email.required"> Please give your email address</span>

                            <span v-if="!$v.email.email"> 
                             Please give a valid email address
                         </span>
                     </div>
                     <div v-else>
                        <div v-if="emailStatus === 'checking'" class="text-info"> checking <i class="fa fa-spinner fa-spin"></i></div>
                        <div v-else-if="emailStatus === 'error'" class="text-danger">  
                            <span><i class="fa fa-warning"></i></span>
                        email already exists</div>
                        <div v-else-if="email == ''"></div>
                        <div v-else><i class="fa fa-check text-success"></i></div>
                    </div>
                </div>
                <div class="col-md-6 form-field">
                    <label for="phone_no" class="col-form-label">Your Phone No
                        <span class="required-icon">*</span>
                    </label>
                    <input type="text"
                    v-model.trim="$v.phone_no.$model"
                    class="form-control" 
                    :class="{' is-invalid': $v.phone_no.$error || phoneStatus === 'error'}"
                    id="phone_no" 
                    name="phone_no" 
                    placeholder="Write Your phone no">
                    <div v-if="$v.phone_no.$error" class="text-danger">
                        <span><i class="fa fa-warning"></i></span>
                        <span v-if="!$v.phone_no.required"> Please give your phone no</span>

                        <span v-if="!$v.phone_no.maxLength"> 
                         Please give a phone number between 14 characters
                     </span>
                 </div>
                 <div v-else>
                    <div v-if="phoneStatus === 'checking'" class="text-info"> checking <i class="fa fa-spinner fa-spin"></i></div>
                    <div v-else-if="phoneStatus === 'error'" class="text-danger">  
                        <span><i class="fa fa-warning"></i></span>
                    Phone no already exists</div>
                    <div v-else-if="phone_no == ''"></div>
                    <div v-else><i class="fa fa-check text-success"></i></div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <label for="division_id" class="col-form-label">Division 
                    <span class="required-icon">*</span>
                </label>
                <select 
                v-model.trim="$v.division_id.$model"
                name="division_id" 
                id="division_id" 
                @change="setDistricts($event)"
                class="form-control"
                :class="{' is-invalid': $v.division_id.$error}">
                <option value="">Select your division</option>
                <option :value="division.id" v-for="division in divisions">{{ division.name }}</option>
            </select>

            <div v-if="$v.division_id.$error" class="text-danger">
                <span><i class="fa fa-warning"></i></span>
                <span v-if="!$v.division_id.required"> Please select your division
                    <span class="required-icon">*</span>
                </span>
            </div>
            <div v-else-if="division_id == ''"></div>
            <div v-else>
                <i class="fa fa-check text-success"></i>
            </div>
        </div>
        <div class="col-md-4">
            <label for="district_id" class="col-form-label">District 
                <span class="required-icon">*</span>
            </label>
            <select 
            v-model.trim="$v.district_id.$model"
            name="district_id" 
            id="district_id" 
            class="form-control"
            :class="{' is-invalid': $v.district_id.$error}">
            <option value="">Select your district</option>
            <option :value="district.id" v-for="district in districts">{{ district.name }}</option>
        </select>

        <div v-if="$v.district_id.$error" class="text-danger">
            <span><i class="fa fa-warning"></i></span>
            <span v-if="!$v.district_id.required"> Please select your district
                <span class="required-icon">*</span>
            </span>
        </div>
        <div v-else-if="district_id == ''"></div>
        <div v-else>
            <i class="fa fa-check text-success"></i>
        </div>
    </div>
    <div class="col-md-4">
        <label for="street_address" class="col-form-label">Street Address <span class="required-icon">&nbsp;</span></label>
        <input type="text"
        v-model.trim="$v.street_address.$model"
        class="form-control" 
        :class="{' is-invalid': $v.street_address.$error}"
        id="street_address" 
        name="street_address" 
        placeholder="Write Your Last Name">
        <div v-if="$v.street_address.$error" class="text-danger">
            <span><i class="fa fa-warning"></i></span>
            <span v-if="!$v.street_address.required"> Please give your street address</span>
        </div>
        <div v-else-if="street_address == ''"></div>
        <div v-else>
            <i class="fa fa-check text-success"></i>
        </div>
    </div>

</div>


<div class="form-group row">
    <div class="col-md-6 form-field">
        <label for="password" class="col-form-label">Password
            <span class="required-icon">*</span>
        </label>
        <input type="password"
        v-model.trim="$v.password.$model"
        class="form-control" 
        :class="{' is-invalid': $v.password.$error}"
        id="password" 
        name="password" 
        placeholder="Write Your password">
        <div v-if="$v.password.$error" class="text-danger">
            <span><i class="fa fa-warning"></i></span>

            <span v-if="!$v.password.required"> 
             Please give a password
         </span>
         <span v-if="!$v.password.minLength"> 
             Please give a password more than 6 characters characters
         </span>
     </div>
     <div v-else-if="password == ''"></div>
     <div v-else>
        <i class="fa fa-check text-success"></i>
    </div>
</div>
<div class="col-md-6 form-field">
    <label for="confirm_password" class="col-form-label">Confirm password
        <span class="required-icon">*</span>
    </label>
    <input type="password"
    v-model.trim="$v.confirm_password.$model"
    class="form-control" 
    :class="{' is-invalid': $v.confirm_password.$error}"
    id="confirm_password" 
    name="confirm_password" 
    placeholder="Confirm password" />
    <div v-if="$v.confirm_password.$error" class="text-danger">
        <span><i class="fa fa-warning"></i></span>

        <span v-if="!$v.confirm_password.required"> Please give confirm password</span>

        <span v-if="!$v.confirm_password.minLength">  Please confirm password will be more than 6 characters characters</span>
        <span v-if="!$v.confirm_password.sameAs"> Password combination doesn't match</span>
    </div>
    <div v-else-if="confirm_password == ''"></div>
    <div v-else>
        <i class="fa fa-check text-success"></i>
    </div>
</div>
</div>


<div class="form-group row">
    <div class="register-footer">
        <div class="register-footer-content">
            <div class="Stuffs">
            <div class="already-account">
                <label class="span">
                    Already have an account
                </label>
                <div class="already-account-login">
                    <a :href="url+'/login'">Login</a>
                </div>
            </div>
        </div>
        <div class="createAccount">
            <label class="span">Create my account</label>
            <button v-if="submitStatus == 'PENDING'"  class="btn-register">
                Creating <i class="fa fa-spinner fa-spin"></i>
            </button>
            <button v-else type="submit" class="btn-register">
                Create Account
            </button>
        </div>
        </div>
        <div class="termsNcondition">
            By clicking Create Account, you acknowledge you have read and agreed to
            our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
        </div>      
    </div>
</div>
</div>

</form>


</div>
</template>

<script>

    import { required, minLength, maxLength, alphaNum, email, url, numeric, sameAs } from 'vuelidate/lib/validators';
    export default {
        props: {
            url: {
                type: String,
                required: true
            },
            
        },
        mounted(){
            let vm = this;
            vm.getDivisions();
        },

        data: function() {
            return {

                first_name : '',
                last_name : '',
                division_id : '',
                district_id : '',
                street_address : '',
                email : '',
                phone_no : '',
                password : '',
                confirm_password : '',

                submitStatus: null,
                emailStatus: '',
                phoneStatus: '',
                serverErrors: [],
                divisions: [],
                districts: []
            }
        },

        validations:
        {
            first_name: {
              required,
              minLength: minLength(3),
              maxLength: maxLength(20),
          },
          last_name: {
              minLength: minLength(3),
              maxLength: maxLength(15),
          },
          email: {
              required,
              email
          },
          phone_no: {
              required,
              maxLength: maxLength(14)
          },
          division_id: {
            required
        },
        district_id: {
            required
        },
        street_address: {
            required
        },
        password: {
            required,
            minLength: minLength(6)
        },
        confirm_password: {
            required,
            minLength: minLength(6),
            sameAsPassword: sameAs('password')
        },


    },

    methods: {

      submitForm() {
        let vm = this;
        vm.$v.$touch()
        if (vm.$v.$invalid) {
            vm.submitStatus = 'ERROR';
        } else {
        // do your submit logic here
        vm.submitStatus = 'PENDING';

        // Now submit data to server
        
        axios.post(vm.url + '/api/users/register', {
            first_name: vm.first_name,
            last_name: vm.last_name,
            division_id: vm.division_id,
            district_id: vm.district_id,
            street_address: vm.street_address,
            email: vm.email,
            phone_no: vm.phone_no,
            password: vm.password,
            password_confirmation: vm.confirm_password

        }).then(function (response){
            console.log(response)

            if (response.data.status) {
                vm.submitStatus = 'OK';
                vm.first_name = "";
                vm.last_name = "";
                vm.email = "";
                vm.phone_no = "";
                vm.password = "";
                vm.confirm_password = "";
            }else {
                vm.submitStatus = 'ERROR';
                vm.serverErrors = error.response.data.errors;
                console.log(vm.serverErrors);
            }
        }).catch(function (error){
            // vm.serverErrors = response.data.errors;
            vm.submitStatus = 'ERROR';
            vm.serverErrors = error.response.data.errors;
            console.log(vm.serverErrors);


        });

    }

},
getDivisions(){
    let vm = this;
    axios.get(vm.url + '/api/divisions')
    .then(function (response){
        vm.divisions = response.data;
    }).catch(function (error){

    });
},
setDistricts(event){
    let vm = this;
    if (event.target.value.length > 0) {
        axios.get(vm.url + '/api/districts/'+event.target.value)
        .then(function (response){
            vm.districts = response.data;
            console.log(response)
        }).catch(function (error){

        });
    }
    
}
},


watch: {

    email: _.debounce(function() { 

        let vm = this;
        vm.emailStatus = 'checking';
            // Send it to server and check
            if (vm.email) {
                axios.get(vm.url + '/api/users/email-check', {
                    params: {
                        email: vm.email
                    }
                }).then(function (response){
                    // If unique, set the slug else refactor it and make unique
                    if (response.data) {
                    // It's unique
                    vm.emailStatus = 'ok';
                }else {
                     // It's not unique
                     vm.emailStatus = 'error';
                 }
             }).catch(function (error){
                console.log(error);
            });
         }
     }, 100),

    phone_no: _.debounce(function() { 

       let vm = this;
       vm.phoneStatus = 'checking';
            // Send it to server and check
            if (vm.phone_no) {
                axios.get(vm.url + '/api/users/phone-check', {
                    params: {
                        phone_no: vm.phone_no
                    }
                }).then(function (response){
                    // If unique, set the slug else refactor it and make unique
                    if (response.data) {
                    // It's unique
                    vm.phoneStatus = 'ok';
                }else {
                     // It's not unique
                     vm.phoneStatus = 'error';
                 }
             }).catch(function (error){
                console.log(error);
            });
         }
     }, 100),    

    submit_status: _.debounce(function() { 

       if (submit_status == "OK") {
        this.first_name  = '',
        this.last_name  = '',
        this.email  = '',
        this.phone_no  = '',
        this.address  = '',
        this.role = '',
        this.password  = '',
        this.confirm_password  = '',
        this.emailStatus = '',
        this.phoneStatus = '',
        this.serverErrors = []
    }
}, 100),
    
}

}

</script>
