@extends("admin.layouts.app")


@section("content")
    <main class="main-content">

        <div class="modal fade" tabindex="-1" role="dialog" id="compose">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">نوشتن ایمیل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("admin.messages.store")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <select name="type" id="" class="form-control">
                                        <option value="all">همه</option>
                                    @foreach(\App\Models\User::pluck("email")->toArray() as $user)
                                        <option value="{{$user}}">{{$user}}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="موضوع">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" cols="30" rows="10"  id="email-compose-editor" placeholder="متن پیام"></textarea>
                            </div>
                            <button class="btn btn-primary">
                                <i class="fa fa-send m-r-5"></i> ارسال
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="read">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">جزئیات ایمیل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" data-toggle="tooltip" title="بازگشت" data-dismiss="modal"
                                   class="btn btn-light m-r-5">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="حذف" class="btn btn-light m-r-5">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="علامت اسپم" class="btn btn-light">
                                    <i class="fa fa-warning"></i>
                                </a>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">پاسخ</a>
                                    <a class="dropdown-item" href="#">پاسخ به همه</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">انتقال به بایگانی</a>
                                    <a class="dropdown-item" href="#">تنظیمات</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20">
                            <h3 class="mb-1 primary-font">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                <i class="mdi mdi-star text-warning"></i>
                            </h3>
                            <p>
                                <small class="text-muted">28 خرداد 1398، 3:15 ب.ظ</small>
                            </p>
                            <div class="d-flex align-items-center p-l-r-0 m-b-20">
                                <figure class="avatar avatar-sm m-r-15">
                                    <span class="avatar-title bg-primary rounded-circle">ت</span>
                                </figure>
                                <div>
                                    <h6 class="mb-1 primary-font line-height-20">تونی استارک</h6>
                                    <span class="small text-muted">مهندس</span>
                                </div>
                            </div>
                            <div class="text-muted text-left">
                                <a href="#"
                                   class="btn btn-outline-light text-left align-items-center justify-content-center m-r-10 m-b-20">
                                    <i class="fa fa-file-excel-o font-size-25 m-r-10"></i>
                                    <div class="small">
                                        <div class="m-b-5">example.txt</div>
                                        <div dir="ltr">10 KB</div>
                                    </div>
                                </a>
                                <a href="#"
                                   class="btn btn-outline-light text-left align-items-center justify-content-center m-b-20">
                                    <i class="fa fa-file-pdf-o font-size-25 m-r-10"></i>
                                    <div class="small">
                                        <div class="m-b-5">test.txt</div>
                                        <div dir="ltr">10 KB</div>
                                    </div>
                                </a>
                            </div>
                            <div class="read-mail-body">
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                    می باشد.
                                </p>
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                    می باشد.
                                </p>
                                <p>
                                    <img src="assets/media/image/portfolio-three.jpg" alt="image">
                                </p>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان</p>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                    برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                    می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و
                                    متخصصان</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button data-toggle="modal" data-target="#compose" class="btn btn-primary btn-block mb-4">
                            ایجاد
                        </button>
                        <h6 class="font-size-13 mb-3 text-muted">فیلتر</h6>
                        <div class="mb-4">
                            <div class="list-group list-group-sm list-group-flush">
                                <a href="#" class="list-group-item link-1 pl-0">صندوق ورودی</a>
                                <a href="#" class="list-group-item link-1 pl-0">ستاره دار</a>
                                <a href="#" class="list-group-item link-1 pl-0">مهم</a>
                                <a href="#" class="list-group-item link-1 pl-0">چک نویس</a>
                                <a href="#" class="list-group-item link-1 pl-0">زباله دان</a>
                            </div>
                        </div>
                        <h6 class="font-size-13 mb-3 text-muted">برچسب ها</h6>
                        <div class="list-group list-group-sm list-group-flush">
                            <a href="#" class="list-group-item link-1 px-0 d-flex align-items-center">
                                پشتیبانی قالب
                                <span class="text-warning fa fa-circle ml-auto"></span>
                            </a>
                            <a href="#" class="list-group-item link-1 px-0 d-flex align-items-center">
                                فریلنس
                                <span class="text-danger fa fa-circle ml-auto"></span>
                            </a>
                            <a href="#" class="list-group-item link-1 px-0 d-flex align-items-center">
                                اجتماعی
                                <span class="text-info fa fa-circle ml-auto"></span>
                            </a>
                            <a href="#" class="list-group-item link-1 px-0 d-flex align-items-center">
                                دوستان
                                <span class="text-secondary fa fa-circle ml-auto"></span>
                            </a>
                            <a href="#" class="list-group-item link-1 px-0 d-flex align-items-center">
                                گفتگو
                                <span class="text-success fa fa-circle ml-auto"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text pt-0 pb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck"></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">اقدامات
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">حذف </a>
                                        <a class="dropdown-item" href="#">علامت خوانده شده</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">انتقال به بایگانی</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">حذف </a>
                                    <a class="dropdown-item" href="#">علامت خوانده شده</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">انتقال به بایگانی</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-email-list">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr class="cursor-pointer">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customCheck0">
                                                        <label class="custom-control-label" for="customCheck0"></label>
                                                    </div>
                                                    <a href="#" class="m-l-20">
                                                        <i class="fa fa-star font-size-16 text-warning"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{shorter($message->subject,15)}}</div>
                                            </td>
                                            <td>
                                                <span class="badge-primary badge">اجتماعی</span>
                                            </td>
                                            <td>
                                                <div class="email-subject">
                                                    <p class="m-0">{{shorter($message->message,30)}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="fa fa-paperclip"></i>
                                                </a>
                                            </td>
                                            <td>08:01 ق.ظ</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="" class="dropdown-toggle btn btn-light btn-sm btn-floating"
                                                       data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">بررسی</a>
                                                        <form action="{{route('admin.messages.destroy',$message->id)}}"
                                                              method="post" id="delete_message{{$message->id}}">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>
                                                        <a class="dropdown-item"
                                                           onclick='event.preventDefault();document.getElementById("delete_message{{$message->id}}").submit()'
                                                           href="#">حذف</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <nav class="m-t-30">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبلی</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">بعدی</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
