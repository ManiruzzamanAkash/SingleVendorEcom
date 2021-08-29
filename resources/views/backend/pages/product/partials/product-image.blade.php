<div class="modal fade" id="product-images-modal" tabindex="-1" role="dialog"
    aria-labelledby="product-images-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product-images-modalLabel">View & Manage Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->images as $key => $image)
                            <tr id="product-image-{{ $image->id }}">
                                <td>
                                    <img src="{{ asset('images/products/' . $image->image) }}" alt="" width="150" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="deleteProductImage({{ $image->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @if (count($product->images) === 0)
                    <div class="alert alert-danger">
                        No Image uploaded yet, Please upload one !
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
