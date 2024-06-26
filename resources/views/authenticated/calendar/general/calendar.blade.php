@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <p class="text-center" style="font-size: 20px; margin-top: 30px; padding-top: 30px;">{{ $calendar->getTitle() }}</p>
    <div class="w-75 m-auto border" style="border-radius: 5px;">


      <div class=""style="margin-bottom: 10px;">
        {!! $calendar->render() !!}
      </div>
    </div>
      <div class="text-right w-75 m-auto reserve-margin-top">
          <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
      </div>
  </div>
</div>

{{-- 予約キャンセルモーダルの作成 --}}

<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="{{ route('deleteParts') }}" method="post">
      <div class="w-100">
      <div class="reservation-details">
        <p>予約日: <span class="reserveDate"></span></p>
        <p>時間:リモ<span class="reservePart"></span>部</p>
        <p>上記の予約をキャンセルしてもよろしいでしょうか？</p>
      </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="submit" class="btn btn-primary d-block" value="キャンセル">
        </div>
      </div>
      {{ csrf_field() }}
          <input type="hidden" class="reserveDate" name="date" value="">
          <input type="hidden" class="reservePart" name="part" value="">
    </form>
  </div>
</div>


@endsection
