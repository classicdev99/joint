<div class="modal bs-quotation-state-waiting-quote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-3">
                        <label class="">Waiting Quote</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toAdvice()">Need Advice</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="manualUpdate" onclick="toManual()">Manual Update</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-advice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Advice-Costing/Lead Time</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toProposal()">Quoted</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toLost()">Lost</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="manualUpdate" onclick="toManual()">Manual Update</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-lost" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Closed Lost</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-proposal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Quotation/Proposal</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toFollow()">Follow up</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toLost()">Lost</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-follow" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Follow up in progress</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toOrdering()">Ordering</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toPending()">Issue Bill</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-ordering" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Ordering</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-pending" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Pending Bill</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toSpare()">Distrubution</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-spare" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Spare Part Distribution</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toLoading()">To Deliver</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-loading" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Loading Bay</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                        id="needAdvice" onclick="toClosed()">Closed Won</button>
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bs-quotation-state-closed" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quote State Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Current State:</h6>
                    </div>
                    <div class="col-sm-6">
                        <label class="">Closed Won</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>