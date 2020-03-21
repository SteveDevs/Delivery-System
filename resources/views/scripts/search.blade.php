<script>
    $(function() {
        var cardTitle = $('#card_title');
        var table = $('#table');
        var resultsContainer = $('#search_results');
        var count = $('#count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search');
        var searchformInput = $('#search_box');
        var pagination = $('#pagination');
        var searchSubmit = $('#search_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            table.hide();
            clearSearchTrigger.show();
            let noResulsHtml = '<tr>' +
                                '<td>No results</td>' +
                                '<td></td>' +
                                <?php for($i = 0; $i ++; $i < $cols){ ?>
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                <?php } ?>
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            $.ajax({
                type:'POST',
                url: "{{ route($search_route) }}",
                data: searchform.serialize(),
                success: function (result) {
                    let jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            let rolesHtml = '';
                            let roleClass = '';
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="' + val.link + '" search>search</a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="' + val.link-edit + '" data-toggle="tooltip" title="edit">Edit</a>';
                            let deleteCellHtml = '<form method="POST" action="'+ val.link +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '{!! Form::hidden("_method", "DELETE") !!}' +
                                    '{!! csrf_field() !!}' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Delete Action">' +
                                        'Delete' +
                                    '</button>' +
                                '</form>';

                            $.each(val.roles, function(roleIndex, role) {
                                roleClass = 'default';
                                rolesHtml = '<span class="label label-' + roleClass + '">' + role.name + '</span> ';
                            });
                            resultsContainer.append('<tr>' +
                                '<td>' + val.id + '</td>' +
                                '<td>' + val.name + '</td>' +
                                '<td class="hidden-xs">' + val.email + '</td>' +
                                '<td class="hidden-xs">' + val.first_name + '</td>' +
                                '<td class="hidden-xs">' + val.last_name + '</td>' +
                                '<td class="hidden-sm hidden-xs"> ' + rolesHtml  +'</td>' +
                                '<td class="hidden-sm hidden-xs hidden-md">' + val.created_at + '</td>' +
                                '<td class="hidden-sm hidden-xs hidden-md">' + val.updated_at + '</td>' +
                                '<td>' + deleteCellHtml + '</td>' +
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                            '</tr>');
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    count.html(jsonData.length + " {!! trans('usersmanagement.search.found-footer') !!}");
                    pagination.hide();
                    cardTitle.html("{!! trans('usersmanagement.search.title') !!}");
                },
                error: function (response, status, error) {
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        count.html(0 + " None found");
                        pagination.hide();
                        cardTitle.html("Search");
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                table.show();
                cardTitle.html("Showing All");
                pagination.show();
                count.html(" ");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            table.show();
            resultsContainer.html('');
            searchformInput.val('');
            cardTitle.html("Showing All");
            pagination.show();
            count.html(" ");
        });
    });
</script>
