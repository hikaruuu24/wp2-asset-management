<?= $this->extend('layouts/app'); ?>
<?= $this->section('css'); ?>
    <style>
       .master-data {
           cursor: pointer;
       }

       .master-data:hover {
            box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            border-right: 4px solid rgb(0, 98, 128);";
       }
       .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            border-radius: 0.50rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            position: relative;
            width: 100%;
        }

        .info-box .info-box-icon {
            border-radius: 0.50rem 0 0 0.50rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }

        .info-box .info-box-icon > img {
            max-width: 100%;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 15px;
        }
   </style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row mt-4">
    <div class="col-lg-12 col-md-6">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='<?= route_to('role_list') ?>'">
                <div class="info-box bg-gradient-info master-data">
                    <span class="info-box-icon" style="background-color:rgb(0, 98, 128); "><i class="fas fa-user text-white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-size-18 text-bold">Role</span>

                        <span class="font-size-12" style="color: rgba(175, 174, 174, 0.788); line-height:normal;">Create, read, update, delete location.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='<?= route_to('category_list') ?>'">
                <div class="info-box bg-gradient-info master-data">
                    <span class="info-box-icon" style="background-color:rgb(0, 98, 128); "><i class="fas fa-building text-white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-size-18 text-bold">Category</span>

                        <span class="font-size-12" style="color: rgba(175, 174, 174, 0.788); line-height:normal;">Create, read, update, delete location.</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='<?= route_to('type_list') ?>'">
                <div class="info-box bg-gradient-info master-data">
                    <span class="info-box-icon" style="background-color:rgb(0, 98, 128); "><i class="fas fa-video text-white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-size-18 text-bold">Type</span>

                        <span class="font-size-12" style="color: rgba(175, 174, 174, 0.788); line-height:normal;">Create, read, update, and delete cctv.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>



