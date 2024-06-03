{{--  ------------ وراثة الصفحة الاب --sidebar & navbar & footer---  --}}
@extends('layouts.admin')


{{--  ------- ارسال عنوان الصفحة الفرعيةالذي يظهر في رأس الصفحة----  --}}
@section('title')
    تعديل بيانات وحدات القياس للأصناف
@endsection

{{--  ------- ارسال عنوان صفحة المحتوى ----  --}}
@section('contentheader')
    وحدات القياس (الاصناف)
@endsection

{{--  ------- ارسال رابط صفحة المحتوى ----  --}}
@section('contentheaderlink')
    {{--  <a href="{{ route('admin.treasuries.edit') }}">الضبط</a>  --}}
@endsection

@section('contentheaderactive')
    تعديل
@endsection


{{--  ------- ارسال محتوى صفحة الفرع ----  --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:rgb(247, 247, 250);">
                    <h3 class="card-title card_title_center"
                        style="font-size: 25px;font-family:'Times New Roman', Times, serif"> تعديل بيانات وحدات القياس
                        للأصناف:
                        {{ $data->name }} </h3>
                </div>
                <div class="card-body " style="overflow-x:auto;background:rgb(173, 238, 247)">
                    <form action="{{ route('admin.inv_uoms.update') }}" method="post" autocomplete="off" style=""
                        enctype="multipart/form-data">
                        {{--  {{ method_field('patch') }}  --}}
                        {{ csrf_field() }}
                        @if (@isset($data) && !@empty($data))
                            {{--  row1  --}}
                            <div class="row">
                                <div class="col">
                                    <label>رقم الوحدة </label>
                                    <input type="text" class="form-control " id="id" name="id"
                                        value="{{ $data->id }}" readonly>

                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="name" class="control-label">إسم الوحدة</label>
                                    <input type="text" class="form-control " id="name"
                                        name="name"value="{{ $data->name }}" @required(true)>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="active" class="control-label "> الحالة </label>
                                    <select name="active" id="active" class="form-control" @required(true)>
                                        <option value="">-- اختر حالة التفعيل --

                                        </option>
                                        <option {{ old('active', $data->active) == 0 ? 'selected' : '' }} value="0">
                                            غير مفعل </option>
                                        <option {{ old('active', $data->active) == 1 ? 'selected' : '' }} value="1">
                                            مفعل </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="is_master" class="control-label"> نوع الوحدة </label>
                                    <select name="is_master" id="is_master" class="form-control" required>
                                        <option value="">-- اختر نوع الوحدة --

                                        </option>
                                        <option {{ old('is_master', $data->is_master) == 0 ? 'selected' : '' }} value="0" class="bg-warning"> وحدات تجزئة </option>
                                        <option {{ old('is_master', $data->is_master) == 1 ? 'selected' : '' }} value="1" class="bg-primary"> وحدات جملة </option>

                                    </select>
                                </div>
                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                    <label for="com_code" class="control-label">كود الشركة</label>
                                    <input type="text" class="form-control " id="com_code"
                                        name="com_code"value="{{ $data->com_code }}" @readonly(true)>
                                    @error('com_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="d-flex justify-content-center">
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary"style="margin: 10px">حفظ
                                            تعديل البيانات</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.inv_uoms.index') }}"
                                            class="btn btn-sm btn-dark "style="margin: 10px">
                                            رجوع </a>
                                    </td>
                                </tr>
                            </div>
                    </form>
                @else
                    <div class="alert alert-danger">
                        عفوا لاتوجد بيانات !!

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
