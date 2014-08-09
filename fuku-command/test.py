#encoding=utf-8
import jieba

sentence = "獨立音樂需要大家一起來推廣，歡迎加入我們的行列！"
print "Input：", sentence

words = jieba.cut(sentence, cut_all=False)

print "Output 精確模式 Full Mode："
for word in words:
    print word

sentence = "独立音乐需要大家一起来推广，欢迎加入我们的行列！"
print "Input：", sentence

words = jieba.cut(sentence, cut_all=False)

print "Output 精確模式 Full Mode："
for word in words:
    print word

sentence = "我來到北京清華大學"
print "Input：", sentence

words = jieba.cut(sentence, cut_all=False)

print "Output 精確模式 Full Mode："
for word in words:
    print word

sentence = "我来到北京清华大学"
print "Input：", sentence

words = jieba.cut(sentence, cut_all=False)

print "Output 精確模式 Full Mode："
for word in words:
    print word