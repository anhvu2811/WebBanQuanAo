<div style="text-align: center;">
    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>