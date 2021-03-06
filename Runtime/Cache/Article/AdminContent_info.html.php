<?php if (!defined('THINK_PATH')) exit();?><form method="post" class="form-x dux-form form-auto" id="form" action="<?php echo U();?>">
    <div class="tab dux-tab">
        <div class="panel dux-box  active">
            <div class="panel-head">
                <div class="tab-head">
                    <strong><?php echo $name;?>设备</strong>
                    <ul class="tab-nav">
                        <li class="active"><a href="#tab-1">基本信息</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-body">
                <div class="tab-panel active" id="tab-1">
                    <div class="form-group">
                        <div class="label">
                            <label>==设备栏目==</label>
                        </div>
                        <div class="field">
                            <select class="input" name="class_id" id="class_id">
                              <option value="0">请选择栏目</option>
                               <?php foreach ($categoryList as $vo) {?>
                               <option value="<?php echo $vo["class_id"];?>" 
                               <?php if ($info['class_id'] == $vo['class_id']){ ?>
                               selected="selected"
                               <?php } ?>
                               <?php if ($vo['type'] == 0 || $vo['app'] != MODULE_NAME){ ?>
                               style="background-color:#CCC" disabled="disabled"
                               <?php } ?>
                               ><?php echo $vo["cname"];?></option>
                               <?php } ?>
                            </select>
                            <div class="input-note">当前设备的所属栏目</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>设备名称</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="title" name="title" size="60" datatype="*" value="<?php echo $info["title"];?>">
                            
                            <div class="input-note">设备标题请不要填写特殊字符</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>项目编号</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="num" name="num" size="60" datatype="*" value="<?php echo $info["num"];?>">

                            <div class="input-note">项目编号请不要填写特殊字符</div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="label">
                        <label>设备型号</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input" id="xinghao" name="xinghao" size="60" datatype="*" value="<?php echo $info["xinghao"];?>">

                        <div class="input-note">设备型号请不要填写特殊字符</div>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="label">
                            <label>设备序列号</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="xuliehao" name="xuliehao" size="60" datatype="*" value="<?php echo $info["xuliehao"];?>">

                            <div class="input-note">设备序列号请不要填写特殊字符</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>到期时间</label>
                        </div>
                        <div class="field">
                            <input class="input js-time" id="endtime" name="endtime" size="60" value="" type="text" value="<?php echo $info["endtime"];?>" endtime="<?php echo $info["endtime"];?>" placeholder="<?php echo (date("Y-m-d H:i",$info['endtime'])); ?>">
                        <div class="input-note"></div>
                        </div>
                    </div>
                    <div id="expand"></div>
                    <div class="form-group">
                        <div class="label">
                            <label>生成二维码</label>
                        </div>
                        <div class="field" id="img">
                            <a class="button bg-main" id="erweima" style="cursor: pointer">生成二维码</a>

                            <div class="input-note">请先检查内容是否完整</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>设备状态</label>
                        </div>
                        <div class="field">
                               <?php if(!isset($info['status'])){ $info['status'] = 1; }; ?>
                                <div class="button-group radio">
                                    <?php if ($info['status']){ ?>
                                    <label class="button active"><input name="status" value="1" checked="checked" type="radio">
                                    <?php }else{ ?>
                                    <label class="button"><input name="status" value="1" type="radio">
                                    <?php } ?>
                                    <span class="icon icon-check"></span> 发布</label>
                                    <?php if (!$info['status']){ ?>
                                    <label class="button active"><input name="status" checked="checked" value="0" type="radio">
                                    <?php }else{ ?>
                                    <label class="button"><input name="status" value="0" type="radio">
                                    <?php } ?>
                                    <span class="icon icon-times"></span> 不发布</label>
                                </div>
                                <div class="input-note">隐藏后在调用栏目列表时不显示</div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="panel-foot">
                <div class="form-button">
                    <div id="tips"></div>
                    <input type="hidden" name="content_id" id="content_id" type="hidden" value="<?php echo $info["content_id"];?>">
                    <input type="hidden" name="only" id="only" value="<?php echo mt_rand(); ?>">
                    <input type="hidden" name="time" id="time" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">
                    <button class="button bg-main" type="submit">保存</button>
                    <button class="button bg" type="reset">重置</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
	//var content_editor = 'xxxx';
    Do.ready('base', function () {
        //表单综合处理
        //$('#form').duxFormPage();
		//动态获取扩展字段
		$('#class_id').change(function() {
			$('#expand').load('<?php echo U("DuxCms/AdminExpand/getField");?>',{class_id:$(this).val(),content_id:$('#content_id').val()},function(){
				$('#expand').duxFormPage({form:false});
			});
		});
		$('#class_id').change();
    }); 
</script>
<link rel="stylesheet" href="/Public/js/time/jquery.datetimepicker.css" type="text/css">
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/time/jquery.datetimepicker.js"></script>
<script>
    $(".js-time").datetimepicker();
</script>
<script type="text/javascript">
    $(function(){
        $("#erweima").click(function(){
           var only = $("#only").val();
            $.ajax({
                type:"get",
                url:"/admin.php?s=/Article/AdminErweima/qrcode",
                data:{
                    url:'http://www.kaisentech.cn?title='+only,
                    num:only,
                },
                success:function (data) {
                    $("#erweima").remove();
                    var img="<img src="+data+">";
                    var inp="<input name='img' style='display:none' value="+data+">";
                    $("#img").append(inp);
                    $("#img").append(img);
                }

            })
        })
    })
</script>