<!DOCTYPE html>
<html>
<head>
    <title>在线尝试 Bootstrap 实例</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/skin/css/bootstrap.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/skin/css/font-awesome.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/skin/css/buttons.css')?>"/>
    <script type="text/javascript" src="<?php echo base_url('/skin/js/jquery-1.11.3.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/skin/js/jquery.SuperSlide.2.1.1.js')?>"></script>
    <script src="<?php echo base_url('/skin/js/jquery.page.js')?>"></script>
    <script src="<?php echo base_url('/skin/js/bootstrap.js')?>"></script>
    <!--[if lte IE 6]>
    <script src="<?php echo base_url('/skin/js/bootstrap-ie.js')?>"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('/skin/js/html5shiv.min.js')?>"></script>
    <script src="<?php echo base_url('/skin/js/respond.min.js')?>"></script>
    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">

    <h1>Hello, world!</h1>

    <div class="row">

        <div class="col-md-3" style="background-color: #dedef8;box-shadow:
         inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
            <h4>第一列  <small>第一列</small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>

        <div class="col-md-9" style="background-color: #dedef8;box-shadow:
         inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
            <h4>第二列 - 分为四个盒子 <small>第二列 - 分为四个盒子</small></h4>
            <div class="row">
                <div class="col-md-6" style="background-color: #B18904;
               box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
                    <p>Consectetur art party Tonx culpa semiotics. Pinterest
                        assumenda minim organic quis.
                    </p>
                </div>
                <div class="col-md-6" style="background-color: #B18904;
               box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
                    <p> sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="background-color: #B18904;
               box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
                    <p>quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-md-6" style="background-color: #B18904;
               box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim.</p>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <h4>地址</h4>
        <address>
            <strong>Some Company, Inc.</strong><br>
            007 street<br>
            Some City, State XXXXX<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
        </address>

        <address>
            <strong>Full Name</strong><br>
            <a href="mailto:#">mailto@somedomain.com</a>
        </address>
    </div>

    <div class="row">
        <h4>有序列表</h4>
        <ol>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
        </ol>
        <h4>无序列表</h4>
        <ul>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
        </ul>
        <h4>未定义样式列表</h4>
        <ul class="list-unstyled">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
        </ul>
        <h4>内联列表</h4>
        <ul class="list-inline">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
        </ul>
        <h4>定义列表</h4>
        <dl>
            <dt>Description 1</dt>
            <dd>Item 1</dd>
            <dd>Item 1</dd>
            <dd>Item 1</dd>
            <dt>Description 2</dt>
            <dd>Item 2</dd>
        </dl>
        <h4>水平的定义列表</h4>
        <dl class="dl-horizontal">
            <dt>Description 1</dt>
            <dd>Item 1</dd>
            <dt>Description 2</dt>
            <dd>Item 2</dd>
            <dd>Item 2</dd>
            <dd>Item 2</dd>
            <dd>Item 2</dd>
        </dl>
    </div>

    <div class="row">
        <table class="table table-hover table-bordered table-condensed active table-striped">
            <caption>条纹表格布局</caption>
            <thead>
            <tr class="active">
                <th>名称</th>
                <th>城市</th>
            </tr>
            </thead>
            <tbody>
            <tr class="success">
                <td>Tanmay</td>
                <td>Bangalore</td>
            </tr>
            <tr class="info">
                <td>Sachin</td>
                <td>Mumbai</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>表单</h4>
        <form role="form">
            <div class="form-group">
                <label for="name">名称</label>
                <input type="text" class="form-control" id="name"
                       placeholder="请输入名称">
            </div>
            <div class="form-group">
                <label for="inputfile">文件输入</label>
                <input type="file" id="inputfile">
                <p class="help-block">这里是块级帮助文本的实例。</p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> 请打勾
                </label>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
</body>
</html>