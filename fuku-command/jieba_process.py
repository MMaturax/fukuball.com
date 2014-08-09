import sys
import jieba
import jieba.posseg as pseg
jieba.set_dictionary('dict.txt.big')

paragraph = sys.argv[0]
words = pseg.cut(paragraph)
for word in words:
    print word.word, word.flag