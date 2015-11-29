from flask import Flask, render_template, json, request, redirect

app = Flask(__name__)

@app.route('/')
def main():
    return render_template('index.html')

@app.route('/getQuestion', methods=['GET'])
def showQuestion():
    # getQuestion?no_of_questions=25&username=sidath&type=MCQ&module_id=1
    # validate the received values
    try:
        if request.method == 'GET':
            validity = int(request.args['validity'])
            cur_question_no = request.args['cur_question_no']
            level = int(request.args['level'])
            moduleID = request.args['moduleID']
            studentID = request.args['studentID']
            question_count = request.args['question_count']
            assignmentID = request.args['assignmentID']
            if (validity == 0):
                if (level != 1):
                    level = level - 1
                else:
                    level = 1
            else:
                if (level != 5):
                    level = level + 1
                else:
                    level = 5
            return redirect("http://localhost:1234/kdumooc/showQuestion.php?level="+ str(level) +"&cur_question_no=" + cur_question_no + "&moduleID=" + moduleID + "&studentID=" + studentID + "&assignmentID=" + assignmentID + "&question_count=" + question_count, code=302)
        else:
            error = 'Invalid request.'
            return redirect("http://localhost:1234/kdumooc/index.php?error=" + error, code=302)
    except Exception as e:
        return traceback.print_exc()
        # json.dumps({'error': str(e.args)})


if __name__ == "__main__":
    app.run(port=5020, debug=True)
    # app.run()
