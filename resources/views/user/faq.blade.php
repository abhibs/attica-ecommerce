@extends('user.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center my-3">SELLING GOLD</h3>
            <div class="col-12">
                <div class="accordion" id="accordionExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                <li> WHAT ARE THE BENEFITS OF SELLING THROUGH ATTICA? </li>

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We give you the highest commodity price, professional & computerized valuation, instant
                                payments.
                            </div>
                        </div>

                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <li> HOW IS VALUATION DONE AND HOW LONG DOES IT TAKE?</li>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Valuation is done on the spot, we adhere to the latest computerized testing (XRF Testing) &
                                acid test in case of silver articles, a basic test can take up to a minute per article..
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <li> DO YOU CHARGE FOR TESTING AND VALUATION?</li>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Estimation is provided free of cost
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <li>HOW DO YOU DETERMINE THE VALUE OF A COMMODITY?</li>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                It is very simple : Weight of commodity (X) Purity Percentage (X) Buying rate = Value (-)
                                charges = NET VALUE
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <li> WHAT ELSE WILL BE DEDUCTED?</li>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Stones , Beads, Enamel, melt charges weight if present will be deducted for valuation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <li> WILL MY ORNAMENTS GET DAMAGED DUE TO TESTING?</li>
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                NO, your ornaments will not be harmed, we use World’s Top German Technology for Testing.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <li> HOW WILL I BE PAID ?</li>
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                All payments will be based on our company guidelines either by CASH* / NEFT / IMPS / RTGS.
                                (*Subject to statutory guidelines)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <li> WHAT ARE THE DOCUMENTS REQUIRED FOR SELLING GOLD ORNAMENTS?</li>
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                You must produce 1 Photo ID & 1 Address proof out of the following documents i.e. Driving
                                license, Passport, Ration card, Election ID, Work ID, Telephone bill, Mobile bill, Property
                                Sale Deed etc.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <li> I AM NOT A RESIDENT OF BANGALORE CAN I SELL ORNAMENTS & WHAT ARE THE DOCUMENTS REQUIRED
                                    ?</li>
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES you can by providing 1 Photo ID & 1 (local) Address & 1 (Native) Address proof
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <li> ONCE SOLD CAN I BUY BACK MY ORNAMENTS LATER?</li>
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                NO, the ornaments will be sold or it will melted.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                <li> SOME GOLD BUYERS CHARGE 0 SERVICE CHARGES OR A LOW SERVICE CHARGES COMPARED TO ATTICA
                                    WHY?</li>
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Most Gold buyers to attract customers come up with very attractive offers, but what you need
                                to know is that no business can run without a profit.
                                These Buyers will lower the value of the gold purities to adjust their charges which we feel
                                is a corrupt practice.
                                At Attica we follow ethical procedures and service charges fairly levied separately.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwelve">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                <li> CAN I SELL GOLD / SILVER BELONGING TO MY RELATIVE, NEIGHBOR, FRIEND ?</li>
                            </button>
                        </h2>
                        <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                NO you cannot, You can sell Gold / Silver / Diamonds which belong to you, your spouse or
                                your parents with their consent.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThrteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThrteen" aria-expanded="false" aria-controls="collapseThrteen">
                                <li> I AM 18 TO 21 YEARS OLD CAN I SELL MY JEWELLERY?</li>
                            </button>
                        </h2>
                        <div id="collapseThrteen" class="accordion-collapse collapse" aria-labelledby="headingThrteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                If you are aged between 18 to 21 years you need to have consent from your parents or legal
                                guardian, We will require a written letter and their photo id & address proof in order to
                                transact.
                                We have a strict NO MINORS policy and we do not purchase from persons aged below 18 years.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFourteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFourteen" aria-expanded="false"
                                aria-controls="collapseFourteen">
                                <li> UPTO WHAT QUANTITIES CAN I SELL & CAN I SELL MY BROKEN OR TAMPERED JEWELLERY?</li>
                            </button>
                        </h2>
                        <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                No quantity is too small or big for us, you can sell or buy any quantity. YES we purchase
                                broken & tampered gold jewellery.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfifteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen">
                                <li> DO YOU PURCHASE WHITE GOLD?</li>
                            </button>
                        </h2>
                        <div id="collapsefifteen" class="accordion-collapse collapse" aria-labelledby="headingfifteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES we purchase white Gold, Rose gold, Pink gold, Yellow gold, as far as it is Gold
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingsixteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen">
                                <li> CAN I GET THE PAYMENT BY NEFT OR RTGS ?</li>
                            </button>
                        </h2>
                        <div id="collapsesixteen" class="accordion-collapse collapse" aria-labelledby="headingsixteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES we can, Below 2 lakhs through NEFT and above 2 lakhs through RTGS.Name as per bank
                                records, Account no. & type, IFSC code , Bank name & branch details are required): Note your
                                cheque book will contain all this information.
                            </div>
                        </div>
                    </div>


                    <h3 class="text-center my-3">RELEASE PLEDGED GOLD</h3>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeventeen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeventeen" aria-expanded="true"
                                aria-controls="collapseSeventeen">
                                <li> CAN YOU RELEASE GOLD WHICH HAS ALREADY BEEN PLEDGED IN A BANK OR FINANCE COMPANY?</li>
                            </button>
                        </h2>
                        <div id="collapseSeventeen" class="accordion-collapse collapse show"
                            aria-labelledby="headingSeventeen" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES we have this service where we release your gold pledged in Banks, Muthoot, Mannapuram,
                                IIFL, Kosmattam finance, Popular Finance, Pawn brokers etc.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEighteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEighteen" aria-expanded="false"
                                aria-controls="collapseEighteen">
                                <li>HOW DOES THIS WORK, HOW DO I PROCEED?</li>
                            </button>
                        </h2>
                        <div id="collapseEighteen" class="accordion-collapse collapse" aria-labelledby="headingEighteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                First get the details from your banker or financer regarding the Release amount (Principle +
                                Interest) and then visit us with your Pledge receipts, ID, Address proof, cheque book.
                                Our evaluation team will verify the details and suggest you if it is worth releasing the
                                gold. If we feel there is any benefit from releasing then we will arrange for a release of
                                gold immediately..
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNineteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNineteen" aria-expanded="false"
                                aria-controls="collapseNineteen">
                                <li> HOW LONG WILL THIS TAKE AND WILL I BE PAID INSTANTLY?</li>
                            </button>
                        </h2>
                        <div id="collapseNineteen" class="accordion-collapse collapse" aria-labelledby="headingNineteen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Once we release the gold, it will be brought back to our office and final settlements will
                                be made after evaluation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwenty">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                                <li> WHAT IS THE MINIMUM QUANTITY FOR RELEASE OF GOLD ?</li>
                            </button>
                        </h2>
                        <div id="collapseTwenty" class="accordion-collapse collapse" aria-labelledby="headingTwenty"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The minimum quantity is 30 grams for release gold.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyone">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyone" aria-expanded="false"
                                aria-controls="collapseTwentyone">
                                <li> CAN I KEEP SOME PART OF MY GOLD WHICH HAS BEEN RELEASED?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyone" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyone" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES you can, however you will need to inform us prior to the transaction.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentytwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentytwo" aria-expanded="false"
                                aria-controls="collapseTwentytwo">
                                <li> WHAT IF I AM NOT SATISFIED WITH THE VALUATION AFTER RELEASE OF GOLD?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentytwo" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentytwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Before releasing the Gold we would ensure to give you an estimation based on the details
                                provided by you.How ever if you are not satisfied with the valuation after release you will
                                have to repay the amount advanced by us + an additional 5% of the released value.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyThree" aria-expanded="false"
                                aria-controls="collapseTwentyThree">
                                <li> WHAT IF THE VALUE OF THE GOLD TURNS OUT TO BE LOWER THAN THE RELEASED VALUE?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyThree" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes there are chances this can happen, make sure you are providing the correct information
                                regarding the weights, purity, stone beads wax content of gold prior to release of Gold from
                                the Banks.These facts are very critical inputs which determine the value of the gold. In the
                                event the value of the gold turns out to be lower than the released value then the customer
                                has to pay the differential amount.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyfour" aria-expanded="false"
                                aria-controls="collapseTwentyfour">
                                <li>CAN YOU RELEASE MY GOLD LOAN FROM MULTIPLE LOCATIONS ?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyfour" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES we can release Gold from multiple locations which are within Bangalore BBMP limits..
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyfive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyfive" aria-expanded="false"
                                aria-controls="collapseTwentyfive">
                                <li> ARE THERE ANY ADDITIONAL SERVICE CHARGES FOR THIS SERVICE?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyfive" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyfive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                NO this service is FREE, If you wish not to sell the Gold after release only then 5% of the
                                value of the release amount will be charged as service charges.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentysix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentysix" aria-expanded="false"
                                aria-controls="collapseTwentysix">
                                <li> WILL I BE ACCOMPANIED BY YOUR REPRESENTATIVE TO THE BANK OR FINANCE COMPANY?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentysix" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentysix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                YES you will be authorizing our representative to release the gold on your behalf, our
                                representative will deposit the cash to the financer and collect the gold in your
                                presence.Once the Gold is released you will be accompanied to our office by our
                                representative for final valuation & settlements.
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center my-3">OTHER ISSUES</h3>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyseven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyseven" aria-expanded="false"
                                aria-controls="collapseTwentyseven">
                                <li> WHY DO YOU COLLECT MY ID & ADDRESS PROOF?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyseven" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyseven" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                As per our company policy it is mandatory to perform KYC as transactions involve huge
                                values.As most customers would not have preserved their Bill/Invoice copies it becomes
                                difficult for us to know if the ornaments or bullion is a legitimate possession or
                                otherwise.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentyeight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentyeight" aria-expanded="false"
                                aria-controls="collapseTwentyeight">
                                <li> WHAT ARE THE GROUNDS FOR REJECTION OF MY TRANSACTION?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentyeight" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentyeight" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Incorrect KYC submitted, Under age, Improper explanation related to ownership, selling on
                                behalf of others are a few grounds your transaction can be rejected.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwentynine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwentynine" aria-expanded="false"
                                aria-controls="collapseTwentynine">
                                <li> WILL MY DATA BE SHARED WITH ANY ONE?</li>
                            </button>
                        </h2>
                        <div id="collapseTwentynine" class="accordion-collapse collapse"
                            aria-labelledby="headingTwentynine" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Your data is stored confidentially, No person will get access to your information and won’t
                                be misused, however if a requests are made by Government authorities we shall comply with
                                themfaqs
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
