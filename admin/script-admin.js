$(document).ready(function(){
    let edit = false

    function fetchPieteikumi(){
        console.log()
        $.ajax({
            url: 'database/pieteikumi_list.php',
            type: 'GET',
            success: function(response){
                const pieteikumi = JSON.parse(response)
                let template = ''
                pieteikumi.forEach(pieteikums=>{
                    template += `
                        <tr piet_ID="${pieteikums.id}">
                            <td>${pieteikums.id}</td>
                            <td>${pieteikums.vards}</td>
                            <td>${pieteikums.uzvards}</td>
                            <td>${pieteikums.epasts}</td>
                            <td>${pieteikums.talrunis}</td>
                            <td>${pieteikums.datums}</td>
                            <td>${pieteikums.statuss}</td>
                            <td>
                                <a class="pieteikums-item">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="pieteikums-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    `
                })
                $('#pieteikumi').html(template);
                        },
            error: function(){
                alert('Neizdevās ielādēt datus!')
            }
        })
    }

    function fetchPieteikumiSak(){
        console.log()
        $.ajax({
            url: 'database/pieteikumi_list.php',
            type: 'GET',
            success: function(response){
                const pieteikumi = JSON.parse(response)
                let template = ''
                pieteikumi.forEach(pieteikums=>{
                    template += `
                        <tr piet_ID="${pieteikums.id}">
                            <td>${pieteikums.vards}", "${pieteikums.uzvards}</td>
                            <td>${pieteikums.datums}</td>
                            <td>${pieteikums.statuss}</td>
                        </tr>
                    `
                })
                $('#pieteikumi-sak').html(template);
                        },
            error: function(){
                alert('Neizdevās ielādēt datus!')
            }
        })
    }


    fetchPieteikumi(),
    fetchPieteikumiSak(),

    $(document).on('click', '.pieteikums-item', (e) =>{
        $(".modal").css('display', 'flex')
        const element = $(e.currentTarget).closest('tr')
        const id = $(element).attr('piet_ID')
        console.log(id)

        $.post('database/pieteikums_single.php', {id}, (response)=>{
            edit = true
            const pieteikums = JSON.parse(response)
            $('#vards').val(pieteikums.vards),
            $('#uzvards').val(pieteikums.uzvards),
            $('#epasts').val(pieteikums.epasts),
            $('#talrunis').val(pieteikums.talrunis),
            $('#apraksts').val(pieteikums.apraksts),
            $('#statuss').val(pieteikums.statuss),
            $('#piet_ID').val(pieteikums.id)
        })
    })

    $(document).on('click', '.close-modal', (e) =>{
        $(".modal").hide()
        $("pieteikumuForma").trigger('reset')
        edit = false
    })

    $(document).on('click', '#new-btn', (e) =>{
        $(".modal").css('display', 'flex')
    })

    $(document).on('click', '.pieteikums-delete', (e) =>{
        if(confirm('Vai tiešām velies dzest?')){
            const element = $(e.currentTarget).closest('tr')
            const id = $(element).attr('piet_ID')
            $.post('database/pieteikums_delete.php', {id}, () =>{
                fetchPieteikumi()
            })
        }
        })

        $('#pieteikumuForma').submit( e=>{
            e.preventDefault()
            const postData ={
                vards: $('#vards').val(),
                uzvards: $('#uzvards').val(),
                epasts: $('#epasts').val(),
                talrunis: $('#talrunis').val(),
                apraksts: $('#apraksts').val(),
                statuss: $('#statuss').val(),
                id: $('#piet_ID').val()
            }
        
            const url = !edit ? 'database/pieteikums_add.php' : 'database/pieteikums_edit.php'
            console.log(postData, url)
        
            $.post(url, postData, () =>{
                $(".modal").hide()
                //reseto datus no formas pec aizveršanas
                $("#pieteikumuForma").trigger('reset')
                edit = false
                fetchPieteikumi()
            })
        })

})