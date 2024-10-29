@extends("layouts.master")
@section('content')
<div class="profile_page">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Write Email</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-sm-12 mt-mob-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mail_content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="mail_head mb-3">Compose Message</h3>
                                </div>
                                <div class="mail_message col-lg-12">
                                    <form action="/send-emails" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="recipient-select" class="col-form-label">To:</label>
                                            <select class="form-control" id="recipient-select" name="recipients[]"
                                                multiple="multiple">
                                                <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['email']; ?>">
                                                    <?php echo $user['full_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject-input" class="col-form-label">Subject</label>
                                            <input class="form-control" type="text" name="subject" id="subject-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-textarea" class="col-form-label">Compose Message</label>
                                            <textarea name="message" class="form-control"
                                                id="message-textarea">Enter Text to Edit</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mb-3">
                                                <i class="fa fa-envelope" aria-hidden="true"></i> Send Message
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection