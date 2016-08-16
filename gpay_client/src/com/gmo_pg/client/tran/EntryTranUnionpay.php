<?php
require_once (ROOT_GMO.'com/gmo_pg/client/common/Cryptgram.php');
require_once (ROOT_GMO.'com/gmo_pg/client/common/GPayException.php');
require_once (ROOT_GMO.'com/gmo_pg/client/output/EntryTranUnionpayOutput.php');
require_once (ROOT_GMO.'com/gmo_pg/client/tran/BaseTran.php');
/**
 * <b>ネット銀聯取引登録　実行クラス</b>
 * 
 * @package com.gmo_pg.client
 * @subpackage tran
 * @see tranPackageInfo.php
 * @author GMO PaymentGateway
 */
class EntryTranUnionpay extends BaseTran {

	/**
	 * コンストラクタ
	 */
	function EntryTranUnionpay() {
	    parent::__construct();
	}
	
	/**
	 * 取引登録を実行する
	 *
	 * @param  EntryTranUnionpayInput $input  入力パラメータ
	 * @return EntryTranUnionpayOutput $output 出力パラメータ
	 * @exception GPayException
	 */
	function exec(&$input) {
	    
        // 接続しプロトコル呼び出し・結果取得
        $resultMap = $this->callProtocol($input->toString());
	    // 戻り値がnullの場合、nullを戻す
        if (is_null($resultMap)) {
		    return null;
        }
	    
        // EntryTranUnionpayOutput作成し、戻す
	    return new EntryTranUnionpayOutput($resultMap);
	}
}
?>
