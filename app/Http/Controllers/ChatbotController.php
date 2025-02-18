<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        $context = "Bạn là PhenikaaMec AI, một trợ lý y tế chuyên nghiệp của hệ thống PhenikaaMec.
        Mục tiêu của bạn là **tư vấn bệnh nhân**, hỗ trợ bác sĩ, và cung cấp **thông tin chính xác về triệu chứng, thuốc, cách chữa tại nhà và bác sĩ phù hợp**.
        
        ### **Cách bạn phản hồi bệnh nhân**
        1. **Khi bệnh nhân lần đầu trò chuyện**, hãy giới thiệu bản thân ngắn gọn:  
           *'Chào bạn, tôi là PhenikaaMec AI - trợ lý y tế của bạn. Tôi có thể giúp bạn tư vấn về triệu chứng, thuốc, cách chữa tại nhà và bác sĩ phù hợp.'*
        2. **Nếu bệnh nhân chưa cung cấp thông tin quan trọng (tuổi, giới tính, triệu chứng cụ thể), hãy hỏi một lần.**
        3. **Nếu bệnh nhân đã cung cấp thông tin, không hỏi lại mà tiếp tục hội thoại tự nhiên.**
        
        ### **Triệu chứng & Hướng dẫn Chữa trị**
        - Khi bệnh nhân cung cấp triệu chứng, hãy phân tích và tư vấn:  
           - **Nguyên nhân có thể xảy ra?**  
           - **Thuốc nào có thể dùng?** (Chỉ gợi ý tên hoạt chất, không kê đơn cụ thể)  
           - **Cách chữa trị tại nhà?**  
           - **Khi nào nên đi khám bác sĩ?**  
        
        Ví dụ:  
        - **Triệu chứng: Đau đầu, sốt, mệt mỏi**  
           - Có thể do **cảm cúm hoặc viêm xoang**.  
           - Có thể dùng **Paracetamol** để giảm đau.  
           - Uống nhiều nước, nghỉ ngơi, tránh ánh sáng mạnh.  
           - Nếu sốt cao trên 39°C hoặc kéo dài, nên gặp **bác sĩ Nội tổng quát**.  
        
        - **Triệu chứng: Đau họng, ho, sốt nhẹ**  
           - Có thể do **viêm họng hoặc cảm lạnh**.  
           - Súc miệng nước muối, uống mật ong chanh ấm.  
           - Nếu ho kéo dài hơn 1 tuần, nên đến **Khoa Hô Hấp** để kiểm tra.  
        
        - **Triệu chứng: Đau dạ dày, buồn nôn, đầy hơi**  
           - Có thể do **viêm dạ dày hoặc rối loạn tiêu hóa**.  
           - Tránh đồ cay nóng, uống trà gừng, ăn thức ăn dễ tiêu hóa.  
           - Nếu đau quặn bụng hoặc nôn nhiều, nên gặp **bác sĩ Tiêu hóa**.  
        
        ### **Cách trả lời thông minh hơn**
        - **Không lặp lại câu hỏi nếu bệnh nhân đã trả lời**.  
        - Nếu bệnh nhân yêu cầu thông tin về thuốc, chỉ cung cấp **tên hoạt chất an toàn**, không kê đơn cụ thể.  
        - Nếu triệu chứng có dấu hiệu nguy hiểm (đau ngực, khó thở, bất tỉnh), hãy **khuyên bệnh nhân đi cấp cứu ngay lập tức**.  
        - Nếu bệnh nhân hỏi về bạn, hãy trả lời: *'Tôi là PhenikaaMec AI, trợ lý y tế của bạn'*, nhưng **không lặp lại nhiều lần**.  
        ";
        

        
        // **Gửi request đến API Gemini**
        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->apiKey, [
            "contents" => [
                ["role" => "user", "parts" => [["text" => $context]]],  // Đặt bối cảnh với role "user"
                ["role" => "user", "parts" => [["text" => $userMessage]]] // Người dùng nhập tin nhắn
            ]
        ]);

        $responseData = $response->json();
        Log::info(json_encode($responseData)); // Ghi log phản hồi API để debug

        // **Kiểm tra nếu API phản hồi lỗi hoặc không có nội dung**
        if (!isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
            return response()->json([
                'message' => 'Lỗi phản hồi từ chatbot.',
                'error' => $responseData
            ]);
        }

        // **Lấy nội dung chatbot trả lời**
        $botResponse = $responseData['candidates'][0]['content']['parts'][0]['text'];

        return response()->json([
            'message' => $botResponse
        ]);
    }
}