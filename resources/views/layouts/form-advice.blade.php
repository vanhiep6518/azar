<div class="boxWg__contact">
    <div role="form" class="wpcf7" id="wpcf7-f383-o1" lang="vi" dir="ltr">
        <div class="screen-reader-response" role="alert" aria-live="polite"></div>
        <form action="{{route('sendAdvice')}}" id="send-advice-form" method="post" class="wpcf7-form init" novalidate="novalidate">
            @csrf
            <div style="display: none;"> <input type="hidden" name="_wpcf7" value="256"/> <input type="hidden" name="_wpcf7_version" value="5.2"/> <input type="hidden" name="_wpcf7_locale" value="vi"/> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f256-o1"/> <input type="hidden" name="_wpcf7_container_post" value="0"/> <input type="hidden" name="_wpcf7_posted_data_hash" value=""/></div>
            <div class="contact-form">
                <h3>Đăng ký tư vấn</h3>
                <div class="form-group"> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Họ và tên"/></span></div>
                <div class="form-group"> <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="* Số điện thoại"/></span></div>
                <div class="form-group"> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" aria-invalid="false" placeholder="Email"/></span></div>
                <input type="hidden" name="message" value="{{$project->title}}">
                <input type="button" value="Gửi đi" style="border-color: #b7b7b7;" class="wpcf7-form-control wpcf7-submit btn form-control btn__success btn-send-advice"><span class="ajax-loader"></span>
            </div>
            <div class="wpcf7-response-output" role="alert" aria-hidden="true"></div>
        </form>
    </div>
</div>
