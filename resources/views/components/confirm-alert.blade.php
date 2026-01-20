<script>
    $(document).ready(function() {
        $('.confirm-delete').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-confirmed');
                }
            })
        });

        $('.confirm-delete-size').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-size-confirmed');
                }
            })
        });

        $('.confirm-cancel').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to cancel this order!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('cancel-confirmed');
                }
            })
        });

        $('.confirm-delete-product').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this product!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-product-confirmed');
                }
            })
        });


    $('.confirm-logout').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to logout!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit()
                }
            })
        });

        $('.confirm-variation').on('click', function() {
            Swal.fire({
                title: 'Hello!',
                text: "Would you want to add more variation of this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('add_variation_confirmed');
                }
            })
        });
    });

</script>
