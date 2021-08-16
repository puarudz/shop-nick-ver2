var web365 = web365 || {};

web365.utility = (function () {

	function toastSuccess(message) {
	    toastr.success(message, '', { "positionClass": "toast-top-full-width" });
	}

	function toastWarning(message) {
	    toastr.warning(message, '', { "positionClass": "toast-top-full-width" });
	}

	function toastError(message) {
	    toastr.error(message, '', { "positionClass": "toast-top-full-width" });
	}

	return {
		toastSuccess: toastSuccess,
		toastWarning: toastWarning,
		toastError: toastError
	};

})();