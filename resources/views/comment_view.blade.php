@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header" style="background-color:#598a48">
          <h3 class="widget-user-username">{{ ucfirst($data_sent_user->name) }} {{ ucfirst($data_sent_user->sub_name) }}</h3>
          <span><h4 class="widget-user-desc"><b>Contract :</b> {{ ucfirst($data_sent_user->tel) }}</h4></span>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="/bower_components/AdminLTE/dist/img/User_Circle.png" alt="User Avatar">
        </div>
        <div class="box-footer">
          <div class="row">
            <!-- /.col -->
            <div class="col-sm-12">
              <div class="description-block">
                <h5 class="description-header">{{$data_sent_user->rating}}</h5>
                <span class="description-text">RATING</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="box box-widget">
    <div class="box-header with-border">
              <div class="user-block ">
                <span class="username comment_user_block  "><a href="#">COMMENT</a></span>
              </div>
              <!-- /.user-block -->
              <!-- /.box-tools -->
            </div>
    <div class="box-footer box-comments">
    @foreach ($comment as $comment)
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-md" src="/bower_components/AdminLTE/dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                      {{ ucfirst($comment->name) }} {{ ucfirst($comment->sub_name) }}
                        <span class="text-muted pull-right">{{ ($comment->rating) }}</span>
                      </span><!-- /.username -->
                      {{ ($comment->comment) }} 
                </div>
                <!-- /.comment-text -->
              </div>
          @endforeach
              <!-- /.box-comment -->
             
            </div>
            <!-- /.box-footer -->
            <?php
            ?>
            <div class="box-footer" >
              <form action="/addcomment" method="post">
              {{ csrf_field() }}
                <input name="id_notify" type="hidden" value="<?php if($data['id'] != 0){ echo $data->id; }?>">
                <input name="id_user_commened" type="hidden" value="<?php echo $send_id_user;?>">
                <input name="id_commenter" type="hidden" value="<?php echo Auth::user()->id;?>">
                <img class="img-responsive img-circle img-md" src="/bower_components/AdminLTE/dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <div class="row">
                    <div class="col-md-2" style="text-align: center;font-size: 15px;">
                        <lable>RATING<i class="fa fa-star text-yellow"></i></lable>
                    </div>
                    <div class="col-md-8">
                      <select type="text" name="rating" class="form-control input-sm" <?php if($data['id'] == 0){ echo 'disabled'; } ?>>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                      </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="comment" class="form-control input-sm" placeholder="Press enter to post comment" <?php if($data['id'] == 0){ echo 'disabled'; } ?>>
                    </div>
                    <div class="col-md-2 ">
                        <button type="submit" class="btn btn-flat btn-primary btn-block" <?php if($data['id'] == 0){ echo 'disabled'; } ?>>POST</button>
                    </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
    </div>
    </div>
</div>
</div>


  @endsection