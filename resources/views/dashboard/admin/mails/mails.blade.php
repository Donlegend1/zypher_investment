@extends("layouts.master")
@section('content')
<div class="profile_page">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Mail List</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 mt-mob-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mail_content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="mail_head">Inbox <span
                                            class="inbox_numb bg-primary"><?php echo count($mails); ?></span></h3>
                                </div>
                                <div class="col-lg-12">
                                    <div class="pull-right all_mails_btn">
                                        <div class="btn-group btn-split mail_more_btn mt-0">
                                            <button type="button" class="btn btn-primary">All Mails</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail_list col-lg-12 table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th>S/N</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Recipients</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mails as $email)
                                            <tr class="unread">
                                                 <td>{{$loop->iteration}}</td>
                                                <td>{{$email->email->subject}}</td>
                                                <td>{{$email->email->message}}</td>
                                                <td>
                                                   {{$email->recipient_email}}
                                                </td>
                                            </tr>
                                                
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation" class="mt-4">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <span class="ti-angle-left"></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="ti-angle-right"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
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