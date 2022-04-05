<!-- modal de confirmação de exclusão  -->
<div class="modal fade mt-5" id="modal_confirm" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                    <h4 class="mb-1 text-center text-danger">Atenção!</h4>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-0"><span id="modal_confirm-body"></span></h5>
                                </div>
                            </div>
                            <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel"
                                aria-labelledby="tab-dom-04c45e1b-d354-416b-80de-73a934cf53bc"
                                id="dom-04c45e1b-d354-416b-80de-73a934cf53bc">
                                <a href="" id="modal_confirm-href" class="btn btn-sm btn-danger me-1 mb-1">Excluir
                                    registro</a>
                                <button class="btn btn-sm btn-default me-1 mb-1" data-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                            </div>
                            <div class="d-flex mt-5"><span class="fa-stack ms-n1 me-3"></i><i
                                        class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                        data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">Descrição</h5>
                                    <p class="text-word-break fs--1"><span id="modal_confirm-note">Este procedimento
                                            poderá ser desfeito em caso acidental, basta você procurar solicitar aos
                                            administradores do sistema.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
