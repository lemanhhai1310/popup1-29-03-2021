<div uk-toggle="cls: uk-position-cover; mode: media; media: @m" class="modal__box4 uk-flex uk-flex-middle uk-overlay-default" style="z-index: 19">
    <form class="uk-width-1-1" id="contact_form" name='registration'>
        <fieldset class="uk-fieldset">

            <legend class="uk-legend modal__box4__legend">Nhập thông tin để bắt đầu</legend>

            <div class="uk-margin">
                <input name="fname" id="fname" class="uk-input modal__box4__input" type="text" placeholder="Họ tên">
            </div>
            <div class="uk-margin">
                <input name="fphone" id="fphone" class="uk-input modal__box4__input" type="tel" placeholder="Số điện thoại">
            </div>
            <div class="uk-margin">
                <input name="femail" id="femail" class="uk-input modal__box4__input" type="email" placeholder="Email">
            </div>
            <div class="uk-margin">
                <input name="fngaysinh" id="fngaysinh" class="uk-input modal__box4__input" type="text" placeholder="Bạn đang là">
            </div>
            <div class="uk-text-center">
                <input type="submit" id="submit" class="modal__btnStart modal__btnStart--submit uk-border-rounded uk-button uk-button-secondary" value="bắt đầu chơi" name="send"/>
            </div>
            <div>
                <div id="loader"></div>
                <span id="response"></span>
            </div>
        </fieldset>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.modal__box4').addClass('uk-transition-fade');
        $(".modal__btnStart--click").click(function (){
            $('.modal__box4').removeClass('uk-transition-fade');
        });
    });

    // Wait for the DOM to be ready
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='registration']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                fname: "required",
                femail: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                fphone: {
                    required: true,
                    minlength: 10
                }
            },
            // Specify validation error messages
            messages: {
                fname: "Please enter your name",
                fphone: {
                    required: "Please provide a phone",
                    minlength: "Your phone must be at least 10 characters long"
                },
                femail: "Please enter a valid email address"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                var fname = $("#fname").val();
                var fngaysinh = $("#fngaysinh").val();
                var fphone = $("#fphone").val();
                var femail = $("#femail").val();
                var fsubject = 'Thông tin thành viên đăng ký mới';
                var button = $("#submit").val();
                var dataString = 'fngaysinh=' + fngaysinh + '&fname=' + fname + '&fphone=' + fphone + '&femail=' + femail + '&button=' + button + '&fsubject=' + fsubject;

                //validation
                if (fname == '' || fphone == '' || femail == '') { //if you are use other form validation scripts remove the if statement
                    alert("Please fill all fields");
                }
                // AJAX Code To Submit Form.
                else {
                    $('#loader').show();
                    $.ajax({
                        type: "POST",
                        url: "send-mailer.php",
                        data: dataString,
                        cache: false,
                        success: function(result) {
                            $('#loader').hide();
                            $('#response').html(result).fadeIn();
                            $("#contact_form")[0].reset();
                            $('#response').fadeOut(3000).delay(400);
                            // $('.modal__box4').hide();
                            $('.modal__box4').addClass('uk-transition-fade');
                            // $( ".hc-luckywheel-btn" ).trigger( "click" );
                            $('.hc-luckywheel-btn')[0].click();
                        }
                    });
                }
                return false;
            }
        });
    });
</script>