<?php   

 /** 
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     schemes={"http", "https"},
 *     host="localhost:8000",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Canpango beer API",
 *         description="Canpango beer API",
 *         @SWG\Contact(
 *             email="rene@clickasite.co.za"
 *         ),
 *      ),
 * 
 *     @SWG\Definition(
 *         definition="ErrorModel",
 *         type="object",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */