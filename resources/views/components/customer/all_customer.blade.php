<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customers</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                            class="float-end btn m-0 btn-sm custom-btn">Create</button>
                    </div>
                </div>
                <hr class="bg-dark " />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Name</th>
                             <th>Email</th>
                             <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    getAllCustomer()
    async function getAllCustomer() {
        showLoader()
        let response = await axios.get('/customersList')
        hideLoader()

        let tableData = $('#tableData')
        let tableList = $('#tableList')

        tableData.DataTable().destroy();
        tableList.empty();

        response.data.forEach((item, index) => {
            let row = `

    <tr>
        <td> ${index+1}</td>
        <td> ${item['name']}</td>
         <td> ${item['email']}</td>
         <td> ${item['mobile']}</td>

        <td>
            <button data-id="${item['id']}" class="btn editBtn btn-sm custom-btn ">Edit</button>
            <button data-id="${item['id']}" class="btn deleteBtn btn-sm custom-btn">Delete</button>
        </td>
    </tr>

        `
            tableList.append(row)
        })

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await updatedFormId(id)
            $("#update-modal").modal('show');
        })

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        })

        new DataTable('#tableData', {

            order: [
                [0, 'asc']
            ],
            lengthMenu: [5, 10, 15, 20, 30],
            stripeClasses: ['even', 'odd']

        });

    }
</script>
