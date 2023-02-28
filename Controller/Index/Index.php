<?php

namespace Magenteiro\LoadCartById\Controller\Index;

use Exception;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Quote\Model\MaskedQuoteIdToQuoteIdInterface;
use Magento\Quote\Model\QuoteFactory;
use Magento\Quote\Model\ResourceModel\Quote\QuoteIdMask as QuoteIdMaskResourceModel;

/**
 * Class Index
 *
 * @author    Ricardo Martins <ricardo@magenteiro.com>
 * @copyright 2023 Magenteiro
 * @package   Magenteiro\LoadCartById\Controller
 */
class Index implements HttpGetActionInterface
{

    private Http $request;
    private QuoteIdMaskFactory $quoteIdMaskFactory;
    private QuoteIdMaskResourceModel $quoteIdMaskResourceModel;
    private MaskedQuoteIdToQuoteIdInterface $maskedQuoteIdToQuoteId;
    private ResultFactory $result;
    private Session $checkoutSession;

    public function __construct(
        Http $request,
        MaskedQuoteIdToQuoteIdInterface $maskedQuoteIdToQuoteId,
        ResultFactory $result,
        Session $checkoutSession
    )
    {
        $this->request = $request;
        $this->maskedQuoteIdToQuoteId = $maskedQuoteIdToQuoteId;
        $this->result = $result;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $cartHash = $this->request->get('cartId', false);
        try {
            echo $cartId = $this->maskedQuoteIdToQuoteId->execute($cartHash);
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }

        try {
            $this->checkoutSession->setQuoteId($cartId);
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }

        $redirect = $this->result->create(ResultFactory::TYPE_REDIRECT);
        $redirect->setPath('checkout/cart');
        return $redirect;
    }
}
