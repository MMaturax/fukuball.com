#encoding=utf-8
import sys
import jieba
import jieba.posseg as pseg
jieba.set_dictionary('dict.txt.big')

paragraph = sys.argv

print sys.argv

words = pseg.cut("全台大停電")
for word in words:
    print word.word, word.flag