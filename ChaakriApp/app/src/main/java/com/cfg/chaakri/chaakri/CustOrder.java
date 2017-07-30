package com.cfg.chaakri.chaakri;

import android.content.Context;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import static android.content.Context.MODE_PRIVATE;


/**
 * A simple {@link Fragment} subclass.
 * Activities that contain this fragment must implement the
 * {@link CustOrder.OnFragmentInteractionListener} interface
 * to handle interaction events.
 * Use the {@link CustOrder#newInstance} factory method to
 * create an instance of this fragment.
 */
public class CustOrder extends Fragment {
    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    RadioGroup type,location;
    EditText quantity,locationtext;
    RadioButton r1,r2,r3,r4,r5,r6,r7,r8,r9,l1,l2;
    Button orderbutton,buttonFeedback;
    int flag;
    String x="";
    String y="";
    String send="";

    private OnFragmentInteractionListener mListener;

    public CustOrder() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment CustOrder.
     */
    // TODO: Rename and change types and number of parameters
    public static CustOrder newInstance(String param1, String param2) {
        CustOrder fragment = new CustOrder();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_cust_order, container, false);

        if (mListener != null) {
            mListener.onFragmentInteraction("Add Order");
        }

        type=(RadioGroup)view.findViewById(R.id.type);
        quantity=(EditText)view.findViewById(R.id.quantity);
        locationtext=(EditText)view.findViewById(R.id.locationtext);
        location=(RadioGroup)view.findViewById(R.id.location);
        r1=(RadioButton)view.findViewById(R.id.radiobutton1);
        r2=(RadioButton)view.findViewById(R.id.radiobutton2);
        r3=(RadioButton)view.findViewById(R.id.radiobutton3);
        r4=(RadioButton)view.findViewById(R.id.radiobutton4);
        r5=(RadioButton)view.findViewById(R.id.radiobutton5);
        r6=(RadioButton)view.findViewById(R.id.radiobutton6);
        r7=(RadioButton)view.findViewById(R.id.radiobutton7);
        r8=(RadioButton)view.findViewById(R.id.radiobutton8);
        r9=(RadioButton)view.findViewById(R.id.radiobutton9);
        l1=(RadioButton)view.findViewById(R.id.homelocation);
        l2=(RadioButton)view.findViewById(R.id.otherlocation);

        orderbutton=(Button)view.findViewById(R.id.orderbutton);
        orderbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                //send=x+" "+quantity.getText().toString();
                //send+=" "+y;
               /* if(y.equals("0"))
                {
                    send+=" "+y;
                }
                else send+=" 1 "+quantity.getText().toString();*/

                //Toast.makeText(CustomerOrder.this,send,Toast.LENGTH_SHORT).show();

                int typeid=type.getCheckedRadioButtonId();
                int locationid=location.getCheckedRadioButtonId();
                switch(typeid)
                {
                    case (R.id.radiobutton1) :
                        x="1";
                        break;
                    case (R.id.radiobutton2) :
                        x="2";
                        break;
                    case (R.id.radiobutton3) :
                        x="3";
                        break;
                    case (R.id.radiobutton4) :
                        x="4";
                        break;
                    case (R.id.radiobutton5) :
                        x="5";
                        break;
                    case (R.id.radiobutton6) :
                        x="6";
                        break;
                    case (R.id.radiobutton7) :
                        x="7";
                        break;
                    case (R.id.radiobutton8) :
                        x="8";
                        break;
                    case (R.id.radiobutton9) :
                        x="9";
                        break;
                }
                switch(locationid)
                {
                    case (R.id.homelocation):
                        y="0";
                        break;
                    case (R.id.otherlocation):
                        y="1";
                }
                if(y.equals("1"))
                {
                    flag=1;
                    y+=" "+locationtext.getText().toString();
                }

                send= x+ ","+quantity.getText().toString()+","+y;
                Toast.makeText(getContext(),send,Toast.LENGTH_SHORT).show();


                SharedPreferences prefs = getContext().getSharedPreferences("LoginPref", MODE_PRIVATE);
                String cnum = prefs.getString("Username","Nousername");
                String flv = x;
                String caddr = prefs.getString("cAddress","NoAddress");
                String quan = quantity.getText().toString();
                String snum = "0";

                String send = flv + "," +quan+ "," +cnum+ "," +snum ;
                if(y.equalsIgnoreCase("0"))
                {
                    send = send +","+caddr;
                }
                else if(flag==1)
                {
                    send = send +","+locationtext.getText().toString();
                }

                while(send.contains(" "))
                {
                    int ind=send.indexOf(" ");
                    send = send.substring(0,ind)+"_"+send.substring(ind+1);
                }


                new OrderAdd(getContext()).execute(send);


            }
        });



        return view;
    }

    // TODO: Rename method, update argument and hook method into UI event
    public void onButtonPressed(Uri uri) {
        if (mListener != null) {
            mListener.onFragmentInteraction("Add Order");
        }
    }

    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
        if (context instanceof OnFragmentInteractionListener) {
            mListener = (OnFragmentInteractionListener) context;
        } else {
            throw new RuntimeException(context.toString()
                    + " must implement OnFragmentInteractionListener");
        }
    }

    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }

    /**
     * This interface must be implemented by activities that contain this
     * fragment to allow an interaction in this fragment to be communicated
     * to the activity and potentially other fragments contained in that
     * activity.
     * <p>
     * See the Android Training lesson <a href=
     * "http://developer.android.com/training/basics/fragments/communicating.html"
     * >Communicating with Other Fragments</a> for more information.
     */
    public interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        void onFragmentInteraction(String uri);
    }
}
