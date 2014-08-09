import sys
import jieba
import jieba.posseg as pseg

paragraph = sys.argv[0]

jieba.set_dictionary('dict.txt.big')

content = open('lyric.txt', 'rb').read()

words = pseg.cut(paragraph)

for word in words:
    print word.word, word.flag