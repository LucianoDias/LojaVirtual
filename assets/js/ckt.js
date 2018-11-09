window.onload = function(){
	PagSeguroDirectPayment.setSessionId(sessionId);
}
function selectPg(){
	var pgCode = document.getElementById("pg_form").value;
   
	if( pgCode == 'CREDIT_CARD'){
		PagSeguroDirectPayment.getPaymentMethods({
			amount:valor,

			success:function(json){
				var cartaoes = json.paymentMethods.CREDIT_CARD.options;
				var cDisponiveis = ['VISA','MASTERCARD','AMEX','HIPERCARD','ELO'];
				var html ='';

				for(var i in cDisponiveis){
					if(cartaoes[cDisponiveis[i]].status == "AVAILABLE"){
						html += '<img style="cursor: pointer" onclick="selecionarBandeira(this)"data-bandeira="'+cartaoes[cDisponiveis[i]].name+'" src="https://stc.pagseguro.uol.com.br'+cartaoes[cDisponiveis[i]].images.MEDIUM.path+'" border="0"/>';
					}
				}
				document.getElementById("bandeiras").innerHTML = html;
				document.getElementById("cc").style.display ="block";


			},
			error:function(e){ console.log(e); }
		});

	}
}
	function selecionarBandeira(obj){

		var bandeira = obj.getAttribute("data-bandeira");
		document.getElementById("bandeira").value = bandeira.toLowerCase();
		document.getElementById("bandeiras").innerHTML = obj.outerHTML;

		PagSeguroDirectPayment.getInstallments({
			amount:valor,
			brand:bandeira.toLowerCase(),

			success:function(json){
				var parcelas =json.installments[bandeira.toLowerCase()];
				var options ='';

				for(var i in parcelas){
					if(parcelas[i].interestFree == true){var juros =" Sem juros ";}else{var juros = " Com juros ";}
					var frase = parcelas[i].quantity+" x R$ "+parcelas[i].installmentAmount+" ("+juros+")";
					options += '<option value="'+parcelas[i].quantity+';'+parcelas[i].installmentAmount+';'+parcelas[i].interestFree
+';">'+frase+'</option>';


				}

				document.getElementById("parcela").innerHTML = options;
				document.getElementById("cardinfo").style.display = "block";
			},
			error:function(e){console.log(e)}
		});

	}

	function pagar(){

		if(formOK == false){
			var pgCode = document.getElementById("pg_form").value;
			document.getElementById("shash").value = PagSeguroDirectPayment.getSenderHash();

			if(pgCode == 'CREDIT_CARD'){
				
				var cartao = document.getElementById("cartao").value;
				var bandeira = document.getElementById("bandeira").value;
				var cvv = document.getElementById("cvv").value;
				var validade = document.getElementById("validade").value.split('/');
				PagSeguroDirectPayment.createCardToken({

					cardNumber:cartao,
					brand:bandeira,
					cvv:cvv,
					expirationMonth:validade[0],
					expirationYear:validade[1],

					success:function(){
						var token = json.card.token;
						document.getElementById("ctoken").value = token;
						formOK =true;
						document.getElementById("form").submit();  
					},
					error:function(e){console.log(e)}
				});
				return false;
			}
		}
		return true;



	}


