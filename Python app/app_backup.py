__author__ = 'Sidath'

from flask import Flask, render_template, json, request, redirect
import json
import sys, traceback
import urllib
from Quiz import Quiz
# noinspection PyUnresolvedReferences
from flask.ext.mysql import MySQL
from flask import jsonify
from werkzeug import generate_password_hash, check_password_hash

mysql = MySQL()
app = Flask(__name__)


# MySQL configurations
app.config['MYSQL_DATABASE_USER'] = 'root'
app.config['MYSQL_DATABASE_PASSWORD'] = ''
app.config['MYSQL_DATABASE_DB'] = 'kdumooc'
app.config['MYSQL_DATABASE_HOST'] = 'localhost'
mysql.init_app(app)


@app.route('/')
def main():
    return render_template('index.html')


@app.route('/showSignUp')
def showSignUp():
    return render_template('signup.html')


@app.route('/getQuestions', methods=['GET'])
def showQuestion():
    # getQuestion?no_of_questions=25&username=sidath&type=MCQ&module_id=1
    # validate the received values
    try:
        if request.method == 'GET':
            if ((request.args['no_of_questions'] is None) or (request.args['username'] is None) or (
                        request.args['type'] is None) or (request.args['module_id'] is None)):
                string_result = "Invalid Request!"
                return redirect("http://localhost:1234/kdumooc/index.php?error=" + string_result, code=302)
            else:
                no_of_questions = request.args['no_of_questions']
                username = request.args['username']
                module_id = request.args['module_id']
                type = request.args['type']
                newQuiz = Quiz(username, module_id, no_of_questions, type)
                conn = mysql.connect()
                cur = conn.cursor()
                cur_answer = conn.cursor()
                cur_answer_count = conn.cursor()
                query = "SELECT * FROM `questionbank` where idQUESTIONBANK=1"
                query_answer = "SELECT * FROM `answer` where QUESTIONBANK_idQUESTIONBANK=1"
                query_answer_count = "SELECT count(*) FROM `answer` ORDER BY `answer`.`QUESTIONBANK_idQUESTIONBANK`=1"
                param = ("")
                cur.execute(query, param)
                cur_answer.execute(query_answer, param)
                cur_answer_count.execute(query_answer_count, param)
                conn.commit()
                string_result = ''
                data = cur.fetchall()
                data_answer = cur_answer.fetchall()
                data_answer_count = cur_answer_count.fetchall()
                newQuiz.increase_question_no(0)
                cur_question_no = str(newQuiz.cur_question_no)
                for row in data:
                    string_result = row[3]
                    type = row[2]
                    question_id = row[0]
                for row in data_answer_count:
                    answer_count = row[0]
                answer = []
                index_answer = 0
                for answer_row in data_answer:
                    answer.insert(index_answer, answer_row[1])
                    index_answer += 1
                a = {}
                k = 1
                answer_str = "a"
                while k <= answer_count:
                    key = answer_str + str(k)
                    value = answer[k - 1]
                    a[str(key)] = str(value)
                    k += 1
                # print(answer)
                return redirect(
                    "http://localhost:1234/kdumooc/question.php?question=" + string_result + "&question_no=" + cur_question_no + "&type=" + str(
                        type) + "&" + urllib.urlencode(a), code=302)
                '''return redirect(
                    "http://localhost:1234/kdumooc/question.php?question=" + string_result + "&question_no=" + cur_question_no + "&question_id=" + str(question_id) + "&type=" + str(
                        type) + "&answer_count=" + str(answer_count), code=302)'''
                cur.close()
                conn.close()
                return ""
        else:
            error = 'Invalid request.'
            return redirect("http://localhost:1234/kdumooc/question.php?error=" + error, code=302)
    except Exception as e:
        return traceback.print_exc()
        # json.dumps({'error': str(e.args)})


if __name__ == "__main__":
    app.run(port=5020, debug=True)
    # app.run()

