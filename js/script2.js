
$('input[type="radio"]').click(function(){
    var inputValue = $(this).attr("deyer");
    if (inputValue == 'fizikisexskimi'){
        $('body').append('<style> ' +
            '.fizikisexskimi .sexsimelumatlar .logintext .right::before {' +
            'display:block;' +
            '}' +
            '.fizikisexskimi .sexsimelumatlar .logintext .left::after {'+
            'display: block;'+
            '}'+
            '.fizikisexskimi .sexsimelumatlar .logintext .left::before {'+
            'display: block;'+
            '}'+
            '</style>');
        $('.right_change').removeClass('padding');
        $('.right_change').html('<p class="sosial">Sosial şəbəkələrlə qeydiyyat</p>\n' +
            '                            <button class="Facebook">Facebook</button>\n' +
            '                            <button class="Google ">Google</button>');
    }
    else if(inputValue == 'sirketkimi'){
        $('body').append('<style> ' +
            '.fizikisexskimi .sexsimelumatlar .logintext .right::before {' +
            'display:none;' +
            '}' +
            '.fizikisexskimi .sexsimelumatlar .logintext .left::after {'+
            'display: none;'+
        '}'+
            '.fizikisexskimi .sexsimelumatlar .logintext .left::before {'+
            'display: none;'+
            '}'+
            '</style>');
        $('.right_change').addClass('padding');
        $('.right_change').html('<p class="sxsm">Şirkət məlumatları</p>\n' +
            '                            <div class="inpdiv inpdiv1">\n' +
            '                                <span class="mtqx"  style="position: relative;top: 0px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                                <input type="text" name="company_name"  style="margin-top: 50px" placeholder="Şirkət" class="textinput textinput1"> \n' +
            '                            </div>\n' +
            '                            <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                                <input type="text" name="company_address"  style="margin-top: 21px" placeholder="Ünvan" class="textinput textinput2"> \n' +
            '                            </div>\n' +
            '                            <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                                <input type="text" name="company_voen"  style="margin-top: 21px" placeholder="VÖEN" class="textinput textinput3"> \n' +
            '                            </div>\n' +
            '                            <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                                <input type="text" name="company_leader"  style="margin-top: 21px" placeholder="Rəhbər vəzifə" class="textinput textinput4"> \n' +
            '                            </div>\n' +
            '                            <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                                <input type="text" name="company_leader_ns" style="margin-top: 21px" placeholder="Rəhbərin Soyadı Adı" class="textinput textinput5"> \n' +
            '                            </div>');
    }
    else{
        $('body').append('<style> ' +
            '.fizikisexskimi .sexsimelumatlar .logintext .right::before {' +
            'display:none;' +
            '}' +
            '.fizikisexskimi .sexsimelumatlar .logintext .left::after {'+
            'display: none;'+
            '}'+
            '.fizikisexskimi .sexsimelumatlar .logintext .left::before {'+
            'display: none;'+
            '}'+
            '</style>');
        $('.right_change').addClass('padding');
        $('.right_change').html('<p class="sxsm">Şirkət məlumatları</p>\n' +
            '  <select name="teskilatlar" class="teskilatlar" id="selectBox" style="margin-right: 60px;\n' +
            '  margin-top: 53px;\n' +
                'width: 360px !important;\n' +
                'height: 40px !important;\n' +
        '       margin-bottom: 10px;\n' +
            'background-color: #fff !important;\n' +
            '  padding: 11px  215px 6px 35px;!important;\n' +
            '   background-image:\n' +
                    'linear-gradient(45deg, transparent 50%, gray 50%),\n' +
                    'linear-gradient(135deg, gray 50%, transparent 50%),\n' +
                    'linear-gradient(to right, #ccc, #ccc) !important;\n' +
        'background-position:\n' +
        'calc(100% - 20px) calc(1em + 2px),\n' +
        'calc(100% - 15px) calc(1em + 2px),\n' +
        'calc(100% - 2.5em) 0.5em;\n' +
        'background-size:\n' +
        '5px 5px,\n' +
            '5px 5px,\n' +
            '1px 1.5em;\n' +
        'background-repeat: no-repeat;\n' +
            '  display: inline-block;\n' +
            '  border-radius: 4px;\n' +
            '  font-family: Helvetica;\n' +
            '  font-size: 14px;\n' +
            '  font-weight: normal;\n' +
            '  font-stretch: normal;\n' +
            '  font-style: normal;\n' +
            '  line-height: normal;\n' +
            '  color: #698aab;\n' +
            '  text-align: left;\n' +
            '  border: none;">\n' +
            '                            <option value="Hüquqi təşkilat" disabled selected hidden>Hüquqi təşkilat</option>\n' +
            '                            <option  value="mmc">MMC</option>\n' +
            '                            <option  value="personal">Fiziki şəxs</option>\n' +
            '                        </select>\n' +
            '                        <div class="inpdiv inputs" id="mmc">\n' +
            '                            <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_name" type="text" style="margin-top: 21px" placeholder="MMC-nin adı" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_address" type="text" style="margin-top: 21px" placeholder="Ünvan" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_voen" type="text" style="margin-top: 21px" placeholder="VÖEN" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv rehber" >\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_leader" type="text" style="margin-top: 21px" placeholder="Rəhbər vəzifə " class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv rehber">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_leader_ns" type="text" style="margin-top: 21px" placeholder="Rəhbərin Soyadı Adı" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_bank" type="text" style="margin-top: 21px" placeholder="Bank" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_h_account" type="text" style="margin-top: 21px" placeholder="H/Hesab" class="textinput"> <br>\n' +
            '                        </div>\n' +
            '                        <div class="inpdiv">\n' +
            '                                <span class="mtqx" style="position: relative;top: -3px;right: -351px;font-size: 20px;color: #698aab;z-index: 9;">*</span>\n' +
            '                            <input name="agent_m_account" type="text" style="margin-top: 21px" placeholder="M/Hesab" class="textinput"> <br>\n' +
            '                        </div>');
    }
});
$(document).on('change', '#selectBox', function(){
    if ($(this).find('option:selected').attr('value') == 'mmc'){
        $('input[name=agent_name]').attr('placeholder','MMC-nin adı');
        $('.rehber').css('display', 'block');
    }
    else if ($(this).find('option:selected').attr('value') == 'personal'){
        $('input[name=agent_name]').attr('placeholder','Fiziki şəxsin adı');
        $('.rehber').css('display','none')
    }
});





