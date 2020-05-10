<div class="row">
    <div class="col-xl-12">
        <!--begin:: Components/Pagination/Default-->
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <!--begin: Pagination-->
                <div class="kt-pagination kt-pagination--brand">
                    <ul class="kt-pagination__links">
                        <li class="kt-pagination__link--first">
                            <a href="{{$rows->url(1)}}"><i class="fa fa-angle-double-right kt-font-brand"></i></a>
                        </li>
                        <li class="kt-pagination__link--next">
                            <a href="{{$rows->previousPageUrl()}}"><i class="fa fa-angle-right kt-font-brand"></i></a>
                        </li>
                        @if( ! $rows->onFirstPage())
                            <li>
                                <a href="{{$rows->url($rows->currentPage() - 1)}}">{{$rows->currentPage() - 1}}</a>
                            </li>
                        @endif 
                        <li class="kt-pagination__link--active">
                            <a href="{{$rows->url(1)}}">{{$rows->currentPage()}}</a>
                        </li>
                        <li>
                            <a href="{{$rows->url($rows->currentPage() + 1)}}">{{$rows->currentPage() + 1 }}</a>
                        </li>
                        <li class="kt-pagination__link--prev">
                            <a href="{{$rows->nextPageUrl()}}"><i class="fa fa-angle-left kt-font-brand"></i></a>
                        </li>
                        <li class="kt-pagination__link--last">
                            <a href="{{$rows->url($rows->lastPage())}}"><i class="fa fa-angle-double-left kt-font-brand"></i></a>
                        </li>
                    </ul>
                </div>
                <!--end: Pagination-->
            </div>
        </div>
        <!--end:: Components/Pagination/Default-->
    </div>
</div>